@extends('layouts.app')

@section('title', 'Belle Home')
@section('content')

  <!--Body Content-->
  <div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
    <div class="page-title">
      <div class="wrapper">
      <h1 class="page-width">Login</h1>
      </div>
    </div>
    </div>
    <!--End Page Title-->

    <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 offset-md-3">
      <h2 class="text-center mt-5">Your Login Info</h2>

      @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <div class="card p-4 shadow-lg">
        <form method="post" action="{{ route('login.process') }}" id="CustomerLoginForm" class="contact-form">
        @csrf
        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
          <button type="submit" class="btn btn-primary w-100">Login</button>
          <p class="mb-4 mt-4">
          <span id="RecoverPassword">Doesn't have account yet?</span> &nbsp; | &nbsp;
          <a href="{{ route('register') }}" id="customer_register_link">Register</a>
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