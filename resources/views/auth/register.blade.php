@extends('layouts.app')
@section('title', 'Register')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Create an Account</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Form gửi OTP --}}
    @if(!session('otp_phone'))
    <form method="POST" action="{{ route('register.sendOtp') }}">
        @csrf
        <div class="mb-3">
            <label>Phone Number</label>
            <div class="row align-items-center">
                <div class="col-3">
                    <select name="country_code" class="form-select" required>
                        <option value="+84" selected>+84 (VN)</option>
                        <option value="+1">+1 (US)</option>
                        <option value="+44">+44 (UK)</option>
                        <option value="+81">+81 (JP)</option>
                    </select>
                </div>
                <div class="col-9">
                    <input type="text" name="phone" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Send OTP</button>
    </form>
    @else
    {{-- Form xác minh OTP --}}
    <form method="POST" action="{{ route('register.verifyOtp') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" value="{{ session('register_email') }}" readonly>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" value="********" readonly>
        </div>

        <div class="mb-3">
            <label>Enter OTP</label>
            <input type="text" name="otp" class="form-control" required>
            @error('otp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>OTP expires in <span id="otp-timer">15</span> seconds</label>
            <button type="button" id="resend-otp-btn" class="btn btn-sm btn-secondary mt-2" disabled>Resend OTP</button>
        </div>

        <div class="mb-3 text-center">
            <a href="{{ route('register.resetOtp') }}" class="btn btn-outline-danger">← Change phone number</a>
        </div>

        <button type="submit" class="btn btn-success w-100">Verify & Create Account</button>
    </form>
    @endif
</div>

<script>
    // Countdown & resend
    let timer = 15;
    const timerEl = document.getElementById('otp-timer');
    const resendBtn = document.getElementById('resend-otp-btn');

    const countdown = setInterval(() => {
        if (timer > 0) {
            timer--;
            timerEl.textContent = timer;
        } else {
            clearInterval(countdown);
            resendBtn.disabled = false;
        }
    }, 1000);

    resendBtn?.addEventListener('click', () => {
        resendBtn.disabled = true;
        fetch('{{ route("register.resendOtp") }}')
            .then(res => res.json())
            .then(data => {
                alert(data.message || 'OTP resent!');
                timer = 30;
                resendBtn.disabled = true;
                startCountdown();
            });
    });

    function startCountdown() {
        const interval = setInterval(() => {
            if (timer > 0) {
                timer--;
                timerEl.textContent = timer;
            } else {
                clearInterval(interval);
                resendBtn.disabled = false;
            }
        }, 1000);
    }
</script>
@endsection
