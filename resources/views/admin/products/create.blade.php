@extends('admin.layouts.app')

@section('title', 'Belle Products Create')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add Product </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
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
                        <form class="forms-sample" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Product Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputName1"
                                    placeholder="Product Name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea name="description" class="form-control" id="exampleTextarea1"
                                    rows="4">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail" class="file-upload-default" id="thumbnailInput">
                                <div class="input-group col-xs-12">
                                    <input id="thumbnailText" type="text" class="form-control file-upload-info"
                                        placeholder="Chọn ảnh" readonly>
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button"
                                            onclick="document.getElementById('thumbnailInput').click();">Upload</button>
                                    </span>
                                </div>
                                <img id="thumbnailPreview" src="#" alt="Ảnh sản phẩm" width="100" height="100"
                                    style="display:none; margin-top: 10px;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Price</label>
                                <input name="price" type="text" class="form-control" id="exampleInputName1"
                                    placeholder="Price" value="{{ old('price') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Quantity</label>
                                <input name="quantity" type="text" class="form-control" id="exampleInputName1"
                                    placeholder="Quantity" value="{{ old(key: 'quantity') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Category</label>
                                <select class="form-select" id="exampleSelectGender" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
    document.getElementById('thumbnailInput').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let preview = document.getElementById('thumbnailPreview');
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endsection