<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Services\TwilioService;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        return back()->with('error', 'Invalid credentials');
    }

    // Chuyển hướng người dùng đến Facebook để đăng nhập
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Xử lý callback từ Facebook
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Kiểm tra nếu người dùng đã tồn tại trong cơ sở dữ liệu
            $user = User::where('email', $facebookUser->getEmail())->first();

            if (!$user) {
                // Nếu người dùng chưa tồn tại, tạo mới tài khoản
                $user = User::create([
                    'email' => $facebookUser->getEmail(),
                    'password' => bcrypt('gumi@12345'),  // Bạn có thể tạo mật khẩu giả cho tài khoản này
                    'role' => 'user',  // Hoặc thay đổi role nếu cần
                ]);
            }

            // Đăng nhập người dùng và chuyển hướng đến trang chủ
            Auth::login($user);  // Đảm bảo đăng nhập người dùng với trạng thái 'remember me'

            // Debug log để kiểm tra người dùng đã đăng nhập thành công chưa
            \Log::info('Logged in as: ' . $user->email);

            // Kiểm tra xem người dùng đã đăng nhập chưa
            return redirect()->route('home');
        } catch (\Exception $e) {
            \Log::error('Facebook Login Error: ' . $e->getMessage());  // Ghi log lỗi
            return redirect('login')->with('error', 'Failed to login with Facebook');
        }
    }





    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
    }

    public function sendOtp(Request $request, TwilioService $twilio)
    {
        $request->validate([
            'phone' => 'required',
            'country_code' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $fullPhone = $request->country_code . $request->phone;

        session([
            'otp_phone' => $fullPhone,
            'register_email' => $request->email,
            'register_password' => $request->password,
            'register_password_confirmation' => $request->password_confirmation
        ]);

        try {
            $twilio->sendOtp($fullPhone);
            return view('auth.register');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send OTP. ' . $e->getMessage());
        }
    }

    public function verifyOtp(Request $request, TwilioService $twilio)
    {
        $request->validate(['otp' => 'required']);

        $phone = session('otp_phone');
        $otp = $request->otp;

        try {
            $result = $twilio->checkOtp($phone, $otp);

            if ($result->status !== 'approved') {
                return back()->withErrors(['otp' => 'Invalid OTP']);
            }

            $email = session('register_email');
            $password = session('register_password');

            User::create([
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'user',
            ]);

            session()->forget(['otp_phone', 'register_email', 'register_password', 'register_password_confirmation']);

            return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
        } catch (\Exception $e) {
            return back()->withErrors(['otp' => 'OTP verification failed: ' . $e->getMessage()]);
        }
    }

    public function resetOtp()
    {
        session()->forget(['otp_phone', 'register_email', 'register_password', 'register_password_confirmation']);
        return redirect()->route('register');
    }

    public function resendOtp(TwilioService $twilio)
    {
        $phone = session('otp_phone');

        try {
            $twilio->sendOtp($phone);
            return response()->json(['message' => 'OTP resent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to resend OTP. ' . $e->getMessage()], 500);
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
