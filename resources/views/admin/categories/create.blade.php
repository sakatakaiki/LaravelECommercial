@extends('admin.layouts.app')

@section('title', 'Belle Categories Create')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add New Category </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ route('admin.categories.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Category Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputName1"
                                    placeholder="Category Name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{ old('description') }}</textarea>
                            </div>


                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection