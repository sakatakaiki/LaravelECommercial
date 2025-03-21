<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && $request->password === $user->password) {
            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect()->route('admin.products.index'); // Chuyển đến trang quản lý sản phẩm
            }
            return redirect()->route('home'); // Chuyển đến trang home nếu không phải admin
        }

        return back()->with('error', 'Invalid credentials');
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
            'password' => $request->password,
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
    }




    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
