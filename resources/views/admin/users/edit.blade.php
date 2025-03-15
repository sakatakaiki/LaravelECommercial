@extends('admin.layouts.app')

@section('title', 'Belle Users Edit')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit User </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                        <form class="forms-sample" action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Email Address</label>
                                <input name="email" value="{{ old('email', $user->email) }}" type="email"
                                    class="form-control @error('email') is-invalid @enderror" id="exampleInputName1">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword2">
                                <small class="text-muted">Leave blank if you don't want to change password</small>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender">Role</label>
                                <select class="form-select @error('role') is-invalid @enderror" id="exampleSelectGender" name="role">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
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