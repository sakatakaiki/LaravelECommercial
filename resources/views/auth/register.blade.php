@extends('layouts.app')
@section('title', 'Register')
@section('content')

  <div class="container mt-5">
    <h2 class="text-center mb-4">Create an Account</h2>

    {{-- Hiển thị lỗi nếu có --}}
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
    @if(isset($debug_otp))
    <div class="alert alert-info">Debug OTP: {{ $debug_otp }}</div>
  @endif


    {{-- Gửi số điện thoại nhận OTP --}}
    @if(!session('otp'))
    <form method="POST" action="{{ route('register.sendOtp') }}">
    @csrf
    <div class="mb-3">
      <label for="phone" class="form-label">Phone number</label>
      <div class="row align-items-center">
      <div class="col-sm-2">
      <select name="country_code" class="form-select form-select-sm py-1 px-2" style="font-size: 0.9rem;" required>
      <option value="+84" selected>+84 (VN)</option>
      <option value="+1">+1 (US)</option>
      <option value="+44">+44 (UK)</option>
      <option value="+61">+61 (AU)</option>
      <option value="+81">+81 (JP)</option>
      </select>
      </div>
      <div class="col-sm-10">
      <input type="text" name="phone" id="phone" required class="form-control form-control-sm">
      </div>
      </div>
    </div>



    <div class="mb-3">
      <label for="email">Email address</label>
      <input type="email" name="email" required class="form-control" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
      <label for="password">Password</label>
      <input type="password" name="password" required class="form-control">
    </div>
    <div class="mb-3">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" name="password_confirmation" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary w-100">Send OTP</button>
    </form>
  @endif


    {{-- Nếu OTP đã gửi, hiển thị form tạo tài khoản --}}
    @if(session('otp'))
    <form method="POST" action="{{ route('register.verifyOtp') }}" class="mt-4">
    @csrf
    <div class="mb-3">
      <label for="email">Email address</label>
      <input type="email" name="email" required class="form-control"
      value="{{ old('email', session('register_email')) }}" readonly>
    </div>

    <div class="mb-3">
      <label for="password">Password</label>
      <input type="password" name="password" required class="form-control" readonly
      value="{{ session('register_password') }}">
    </div>

    <div class="mb-3">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" name="password_confirmation" required class="form-control" readonly
      value="{{ session('register_password_confirmation') }}">
    </div>

    <div class="mb-3">
      <label for="otp">Enter OTP</label>
      <input type="text" name="otp" required class="form-control">
      @error('otp')
      <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
      <label for="otp">OTP expires in <span id="otp-timer">20</span> seconds</label>
      <button type="button" id="resend-otp-btn" class="btn btn-secondary mt-2" disabled>Resend OTP</button>
    </div>

    <div class="text-center my-3">
      <a href="{{ route('register.resetOtp') }}" class="btn btn-outline-danger">
      ← Change phone number
      </a>
    </div>



    <button type="submit" class="btn btn-success w-100">Create Account</button>
    </form>
  @endif
  </div>

  <script>
    // Resend OTP timer
    let timer = 20;
    const timerElement = document.getElementById('otp-timer');
    const resendBtn = document.getElementById('resend-otp-btn');

    const countdown = setInterval(() => {
    if (timer > 0) {
      timer--;
      timerElement.textContent = timer;
    } else {
      clearInterval(countdown);
      resendBtn.disabled = false;
      resendBtn.addEventListener('click', function () {
      // Gửi lại OTP khi nhấn vào nút Resend
      fetch('{{ route("register.resendOtp") }}', {
        method: 'GET',
        headers: {
        'Content-Type': 'application/json',
        },
      })
        .then(response => response.json())
        .then(data => {
        alert('OTP resent: ' + data.otp); // Hiển thị OTP vừa gửi
        timer = 30; // Reset timer
        resendBtn.disabled = true; // Tắt nút resend
        startCountdown(); // Bắt đầu lại đếm ngược
        });
      });
    }
    }, 1000);

    function startCountdown() {
    const countdown = setInterval(() => {
      if (timer > 0) {
      timer--;
      timerElement.textContent = timer;
      } else {
      clearInterval(countdown);
      resendBtn.disabled = false;
      }
    }, 1000);
    }
  </script>


@endsection