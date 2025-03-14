@extends('admin.layouts.app')

@section('title', 'Belle Products Edit')
@section('content')



    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Product </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                        <form class="forms-sample" action="{{ route('admin.products.update', $product->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="productId" value="{{ $product->id }}" />
                            <div class="form-group">
                                <label for="exampleInputName1">Product Name</label>
                                <input name="name" value="{{ old('name', $product->name) }}" type="text"
                                    class="form-control" id="exampleInputName1" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea name="description" class="form-control" id="exampleTextarea1"
                                    rows="4">{{ old('description', $product->description) }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail" class="file-upload-default" id="thumbnailInput">

                                <div class="input-group col-xs-12">
                                    <input id="thumbnailText" name="thumbnail" type="text" class="form-control file-upload-info" placeholder="Upload Image" readonly>
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button" onclick="document.getElementById('thumbnailInput').click();">Upload</button>
                                    </span>
                                </div>

                                @if (!empty($product->thumbnail))
                                    <img id="thumbnailPreview" src="{{ asset($product->thumbnail) }}" alt="Thumbnail" width="100" height="100">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Price</label>
                                <input name="price" value="{{ old('price', $product->price) }}" type="text"
                                    class="form-control" id="exampleInputName1" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Quantity</label>
                                <input name="quantity" value="{{ old('quantity', $product->quantity) }}" type="text"
                                    class="form-control" id="exampleInputName1" placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Category</label>
                                <select class="form-select" id="exampleSelectGender" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('thumbnailInput').addEventListener('change', function (event) {
            let file = event.target.files[0];
            if (file) {
                document.getElementById('thumbnailText').value = file.name;
                let reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('thumbnailPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection