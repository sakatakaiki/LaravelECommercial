@extends('admin.layouts.app')

@section('title', 'Belle Users Create')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add New User </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form class="forms-sample" action="{{ route('admin.users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Email Address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputName1"
                                    placeholder="Email Address" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword2"
                                    placeholder="Password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Re-enter Password</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation"
                                    placeholder="Re-enter Password">
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection