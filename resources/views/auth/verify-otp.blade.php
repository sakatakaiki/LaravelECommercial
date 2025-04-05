@extends('layouts.app')
@section('title', 'Verify OTP')
@section('content')

<div class="container mt-5">
    <h2 class="text-center">Verify OTP for {{ $phone }}</h2>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('register.verifyOtp') }}">
        @csrf
        <div class="mb-3">
            <label>Enter OTP</label>
            <input type="text" name="otp" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Verify</button>
    </form>
</div>
@endsection
