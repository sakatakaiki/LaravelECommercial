@extends('layouts.app')
@section('title', 'Verify OTP')
@section('content')

<div class="container mt-5">
    <h3 class="text-center mb-3">Verify OTP</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('register.verifyOtp') }}">
        @csrf
        <div class="mb-3">
            <label>OTP Code</label>
            <input type="text" name="otp" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Verify</button>
    </form>
</div>

@endsection
