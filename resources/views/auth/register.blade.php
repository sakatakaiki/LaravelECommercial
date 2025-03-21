@extends('layouts.app')

@section('title', 'Belle Home')
@section('content')

  <!--Body Content-->
  <div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
    <div class="page-title">
      <div class="wrapper">
      <h1 class="page-width">Register</h1>
      </div>
    </div>
    </div>
    <!--End Page Title-->

    <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 offset-md-3">
      <h2 class="text-center mt-5">Your Register Info</h2>

      @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif



      <div class="card p-4 shadow-lg">
        @if ($errors->any())
      <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
      </ul>
      </div>
    @endif
        <form method="post" action="{{ route('register.process') }}" id="CustomerLoginForm" class="contact-form">
        @csrf
        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Re-enter Password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
          <button type="submit" class="btn btn-primary w-100">Register</button>
          <p class="mb-4 mt-4">
          <span id="RecoverPassword">Already have account?</span> &nbsp; | &nbsp;
          <a href="{{ route('login') }}" id="customer_register_link">Login</a>
          </p>
        </div>
        </form>
      </div>



      </div>
    </div>
    </div>
  </div>



  </div>
  <!--End Body Content-->
@endsection