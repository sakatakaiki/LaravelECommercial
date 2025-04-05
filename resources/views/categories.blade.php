@extends('layouts.app')

@section('title', 'Belle Home')
@section('content')

    <!--Body Content-->
    <div id="page-content">
        <!--Collection Banner-->
        <div class="collection-header mb-4">
            <div class="collection-hero">
                <div class="collection-hero__image"><img class="blur-up lazyload"
                        data-src="{{ asset('images/cat-women1.jpg') }}" src="{{ asset('images/cat-women1.jpg') }}"
                        alt="Women" title="Women" /></div>
                <div class="collection-hero__title-wrapper">
                    <h1 class="collection-hero__title page-width">{{ $category->name }}</h1>
                </div>
            </div>
        </div>
        <!--End Collection Banner-->

        <div class="container">
            <div class="row">
                <!--Sidebar-->
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                    <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                    <div class="sidebar_tags">

                        <!--Popular Products-->
                        <div class="sidebar_widget">
                            <div class="widget-title">
                                <h2>Popular Products</h2>
                            </div>
                            <div class="widget-content">
                                <div class="list list-sidebar-products">
                                    <div class="grid">
                                        @foreach ($topProducts as $product)
                                            <div class="grid__item">
                                                <div class="mini-list-item">
                                                    <div class="mini-view_image">
                                                        <a class="grid-view-item__link"
                                                            href="{{ route('products', $product->id) }}">
                                                            <img class="grid-view-item__image"
                                                                src="{{ asset($product->thumbnail) }}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="details"> <a class="grid-view-item__title"
                                                            href="{{ route('products', $product->id) }}">{{ $product->name }}</a>
                                                        <div class="grid-view-item__meta"><span
                                                                class="product-price__price"><span class="money"
                                                                    data-usd-price="{{ number_format($product->price, 2) }}">${{ number_format($product->price, 2) }}</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Popular Products-->
                        <!--Banner-->
                        <div class="sidebar_widget static-banner">
                            <img src="{{ asset('images/side-banner-2.jpg') }}" alt="" />
                        </div>
                        <!--Banner-->
                        <!--Information-->
                        <div class="sidebar_widget">
                            <div class="widget-title">
                                <h2>Information</h2>
                            </div>
                            <div class="widget-content">
                                <p>Use this text to share information about your brand with your customers. Describe a
                                    product, share announcements, or welcome customers to your store.</p>
                            </div>
                        </div>
                        <!--end Information-->
                        <!--Product Tags-->
                        <div class="sidebar_widget">
                            <div class="widget-title">
                                <h2>Product Tags</h2>
                            </div>
                            <div class="widget-content">
                                <ul class="product-tags">
                                    <li><a href="#" title="Show products matching tag $100 - $400">$100 - $400</a></li>
                                    <li><a href="#" title="Show products matching tag $400 - $600">$400 - $600</a></li>
                                    <li><a href="#" title="Show products matching tag $600 - $800">$600 - $800</a></li>
                                    <li><a href="#" title="Show products matching tag Above $800">Above $800</a></li>
                                    <li><a href="#" title="Show products matching tag Allen Vela">Allen Vela</a></li>
                                    <li><a href="#" title="Show products matching tag Black">Black</a></li>
                                    <li><a href="#" title="Show products matching tag Blue">Blue</a></li>
                                    <li><a href="#" title="Show products matching tag Cantitate">Cantitate</a></li>
                                    <li><a href="#" title="Show products matching tag Famiza">Famiza</a></li>
                                    <li><a href="#" title="Show products matching tag Gray">Gray</a></li>
                                    <li><a href="#" title="Show products matching tag Green">Green</a></li>
                                    <li><a href="#" title="Show products matching tag Hot">Hot</a></li>
                                    <li><a href="#" title="Show products matching tag jean shop">jean shop</a></li>
                                    <li><a href="#" title="Show products matching tag jesse kamm">jesse kamm</a></li>
                                    <li><a href="#" title="Show products matching tag L">L</a></li>
                                    <li><a href="#" title="Show products matching tag Lardini">Lardini</a></li>
                                    <li><a href="#" title="Show products matching tag lareida">lareida</a></li>
                                    <li><a href="#" title="Show products matching tag Lirisla">Lirisla</a></li>
                                    <li><a href="#" title="Show products matching tag M">M</a></li>
                                    <li><a href="#" title="Show products matching tag mini-dress">mini-dress</a></li>
                                    <li><a href="#" title="Show products matching tag Monark">Monark</a></li>
                                    <li><a href="#" title="Show products matching tag Navy">Navy</a></li>
                                    <li><a href="#" title="Show products matching tag new">new</a></li>
                                    <li><a href="#" title="Show products matching tag new arrivals">new arrivals</a></li>
                                    <li><a href="#" title="Show products matching tag Orange">Orange</a></li>
                                    <li><a href="#" title="Show products matching tag oxford">oxford</a></li>
                                    <li><a href="#" title="Show products matching tag Oxymat">Oxymat</a></li>
                                </ul>
                                <span class="btn btn--small btnview">View all</span>
                            </div>
                        </div>
                        <!--end Product Tags-->
                    </div>
                </div>
                <!--End Sidebar-->
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                    <div class="productList">
                        <!--Toolbar-->
                        <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                        <div class="toolbar">
                            <div class="filters-toolbar-wrapper">
                                <div class="row">
                                    <div
                                        class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                        <a href="shop-left-sidebar.html" title="Grid View"
                                            class="change-view change-view--active">
                                            <img src="{{ asset('images/grid.jpg') }}" alt="Grid" />
                                        </a>
                                        <a href="shop-listview.html" title="List View" class="change-view">
                                            <img src="{{ asset('images/list.jpg') }}" alt="List" />
                                        </a>
                                    </div>
                                    <div
                                        class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                        <span class="filters-toolbar__product-count">Showing:
                                            {{ $products->total() }}</span>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 d-flex justify-content-end">
                                        <form action="{{ route('categories', ['id' => $category->id]) }}" method="get"
                                            class="d-flex align-items-center">
                                            <!-- Lựa chọn thuộc tính cần sắp xếp -->
                                            <label for="property" class="fw-bold me-2 hidden">Sort by:</label>
                                            <select name="property" id="property" class="form-select me-3"
                                                style="width: 150px;" onchange="this.form.submit()">
                                                <option value="name" {{ request('property') == 'name' ? 'selected' : '' }}>
                                                    Name</option>
                                                <option value="price" {{ request('property') == 'price' ? 'selected' : '' }}>
                                                    Price</option>
                                                <option value="created_at" {{ request('property') == 'created_at' ? 'selected' : '' }}>Time</option>
                                            </select>

                                            <!-- Lựa chọn thứ tự sắp xếp -->
                                            <label for="order" class="fw-bold me-2 hidden">Order:</label>
                                            <select name="order" id="order" class="form-select" style="width: 150px;"
                                                onchange="this.form.submit()">
                                                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>From A-Z
                                                </option>
                                                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>From
                                                    Z-A</option>
                                            </select>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row product-load-more d-flex flex-wrap align-items-stretch">
                                @foreach($products as $product)
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="{{ route('products', $product->id) }}">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                    data-src="{{ asset($product->thumbnail) }}"
                                                    src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}"
                                                    title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="{{ asset($product->thumbnail) }}"
                                                    src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}"
                                                    title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="#" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button class="btn btn-addto-cart">ADD TO CART</button>
                                            </form>
                                            <div class="button-set">
                                                <a href="javascript:void(0)" title="Quick View"
                                                    class="quick-view-popup quick-view" data-toggle="modal"
                                                    data-target="#content_quickview">
                                                    <i class="icon anm anm-search-plus-r"></i>
                                                </a>
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                                        <i class="icon anm anm-heart-l"></i>
                                                    </a>
                                                </div>
                                                <div class="compare-btn">
                                                    <a class="compare add-to-compare" href="compare.html"
                                                        title="Add to Compare">
                                                        <i class="icon anm anm-random-r"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- end product button -->
                                        </div>
                                        <!-- end product image -->

                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="{{ route('products', $product->id) }}">{{ $product->name }}</a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="price money"
                                                    data-usd-price="{{ number_format($product->price, 2) }}">${{ number_format($product->price, 2) }}</span>
                                            </div>
                                            <!-- End product price -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center w-100 mt-3" style="clear: both;">
                                {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>

                        </div>

                    </div>



                </div>
                <!--End Main Content-->
            </div>
        </div>

    </div>
    <!--End Body Content-->




@endsection