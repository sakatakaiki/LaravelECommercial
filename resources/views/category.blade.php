@extends('layouts.app')

@section('title', 'Belle Home')
@section('content')

    <!--Body Content-->
    <div id="page-content">
        <!--Collection Banner-->
        <div class="collection-header">
            <div class="collection-hero">
                <div class="collection-hero__image"><img class="blur-up lazyload" data-src="assets/images/cat-women1.jpg"
                        src="assets/images/cat-women1.jpg" alt="Women" title="Women" /></div>
                <div class="collection-hero__title-wrapper">
                    <h1 class="collection-hero__title page-width">${category.name}</h1>
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
                                        <c:forEach var="product" items="${hotProductList}">
                                            <div class="grid__item">
                                                <div class="mini-list-item">
                                                    <div class="mini-view_image">
                                                        <a class="grid-view-item__link"
                                                            href="ProductServlet?productId=${product.id}&categoryId=${product.categoryId}">
                                                            <img class="grid-view-item__image" src="${product.thumbnail}"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="details"> <a class="grid-view-item__title"
                                                            href="ProductServlet?productId=${product.id}&categoryId=${product.categoryId}">${product.name}</a>
                                                        <div class="grid-view-item__meta"><span
                                                                class="product-price__price"><span class="money"
                                                                    data-usd-price="${product.price}">$${product.price}</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </c:forEach>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Popular Products-->
                        <!--Banner-->
                        <div class="sidebar_widget static-banner">
                            <img src="assets/images/side-banner-2.jpg" alt="" />
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
                                            <img src="assets/images/grid.jpg" alt="Grid" />
                                        </a>
                                        <a href="shop-listview.html" title="List View" class="change-view">
                                            <img src="assets/images/list.jpg" alt="List" />
                                        </a>
                                    </div>
                                    <div
                                        class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                        <span class="filters-toolbar__product-count">Showing: 22</span>
                                    </div>
                                    <form action="CategoryServlet" method="get" class="sort-form" method="get">

                                        <input type="hidden" name="categoryId" value="${category.id}" />

                                        <div class="filters-toolbar__item">
                                            <label for="property" class="hidden">Sort</label>
                                            <select name="property" id="SortBy"
                                                class="filters-toolbar__input filters-toolbar__input--sort">
                                                <option value="title-ascending" selected="selected">Sort</option>
                                                <option value="name">Name</option>
                                                <option value="price">Price</option>
                                                <option value="createdAt">Time</option>
                                            </select>
                                            <input class="collection-header__default-sort" type="hidden" value="manual">
                                            <label for="order" class="hidden">Sort</label>
                                            <select name="order" id="SortBy"
                                                class="filters-toolbar__input filters-toolbar__input--sort">
                                                <option value="title-ascending" selected="selected">Order</option>
                                                <option value="asc">From A-Z</option>
                                                <option value="desc">From Z-A</option>
                                            </select>
                                            <input class="collection-header__default-sort" type="hidden" value="manual">
                                            <button type="submit" class="btn">Filter</button>
                                        </div>




                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row product-load-more">
                                <c:forEach var="product" items="${productList}">
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a
                                                href="ProductServlet?productId=${product.id}&categoryId=${product.categoryId}">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="${product.thumbnail}"
                                                    src="${product.thumbnail}" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="${product.thumbnail}"
                                                    src="${product.thumbnail}" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="CartServlet" method="post">
                                                <input type="hidden" name="action" value="create" />
                                                <input type="hidden" name="productId" value="${product.id}" />
                                                <input type="hidden" name="price" value="${product.price}" />
                                                <input type="hidden" name="quantity" value="1" />
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
                                                <a
                                                    href="ProductServlet?productId=${product.id}&categoryId=${product.categoryId}">${product.name}</a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="price money"
                                                    data-usd-price="${product.price}">$${product.price}</span>
                                            </div>
                                            <!-- End product price -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                </c:forEach>
                            </div>
                        </div>
                    </div>


                    <div class="infinitpaginOuter">
                        <div class="infinitpagin">
                            <a href="#" class="btn loadMore">Load More</a>
                        </div>
                    </div>
                </div>
                <!--End Main Content-->
            </div>
        </div>

    </div>
    <!--End Body Content-->



    <!--Quick View popup-->
    <div class="modal fade quick-view-popup" id="content_quickview">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="ProductSection-product-template" class="product-template__container prstyle1">
                        <div class="product-single">
                            <!-- Start model close -->
                            <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right"
                                title="close"><span class="icon icon anm anm-times-l"></span></a>
                            <!-- End model close -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product-details-img">
                                        <div class="pl-20">
                                            <img src="assets/images/product-detail-page/camelia-reversible-big1.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product-single__meta">
                                        <h2 class="product-single__title">Product Quick View Popup</h2>
                                        <div class="prInfoRow">
                                            <div class="product-stock"> <span class="instock ">In Stock</span> <span
                                                    class="outstock hide">Unavailable</span> </div>
                                            <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                        </div>
                                        <p class="product-single__price product-single__price-product-template">
                                            <span class="visually-hidden">Regular price</span>
                                            <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                                            <span
                                                class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                <span id="ProductPrice-product-template"><span
                                                        class="money">$500.00</span></span>
                                            </span>
                                        </p>
                                        <div class="product-single__description rte">
                                            Belle Multipurpose Bootstrap 4 Html Template that will give you and your
                                            customers a smooth shopping experience which can be used for various kinds of
                                            stores such as fashion,...
                                        </div>

                                        <form method="post" action="http://annimexweb.com/cart/add"
                                            id="product_form_10508262282" accept-charset="UTF-8"
                                            class="product-form product-form-product-template hidedropdown"
                                            enctype="multipart/form-data">
                                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                                <div class="product-form__item">
                                                    <label class="header">Color: <span class="slVariant">Red</span></label>
                                                    <div data-value="Red" class="swatch-element color red available">
                                                        <input class="swatchInput" id="swatch-0-red" type="radio"
                                                            name="option-0" value="Red">
                                                        <label class="swatchLbl color medium rectangle" for="swatch-0-red"
                                                            style="background-image:url(assets/images/product-detail-page/variant1-1.jpg);"
                                                            title="Red"></label>
                                                    </div>
                                                    <div data-value="Blue" class="swatch-element color blue available">
                                                        <input class="swatchInput" id="swatch-0-blue" type="radio"
                                                            name="option-0" value="Blue">
                                                        <label class="swatchLbl color medium rectangle" for="swatch-0-blue"
                                                            style="background-image:url(assets/images/product-detail-page/variant1-2.jpg);"
                                                            title="Blue"></label>
                                                    </div>
                                                    <div data-value="Green" class="swatch-element color green available">
                                                        <input class="swatchInput" id="swatch-0-green" type="radio"
                                                            name="option-0" value="Green">
                                                        <label class="swatchLbl color medium rectangle" for="swatch-0-green"
                                                            style="background-image:url(assets/images/product-detail-page/variant1-3.jpg);"
                                                            title="Green"></label>
                                                    </div>
                                                    <div data-value="Gray" class="swatch-element color gray available">
                                                        <input class="swatchInput" id="swatch-0-gray" type="radio"
                                                            name="option-0" value="Gray">
                                                        <label class="swatchLbl color medium rectangle" for="swatch-0-gray"
                                                            style="background-image:url(assets/images/product-detail-page/variant1-4.jpg);"
                                                            title="Gray"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                                <div class="product-form__item">
                                                    <label class="header">Size: <span class="slVariant">XS</span></label>
                                                    <div data-value="XS" class="swatch-element xs available">
                                                        <input class="swatchInput" id="swatch-1-xs" type="radio"
                                                            name="option-1" value="XS">
                                                        <label class="swatchLbl medium rectangle" for="swatch-1-xs"
                                                            title="XS">XS</label>
                                                    </div>
                                                    <div data-value="S" class="swatch-element s available">
                                                        <input class="swatchInput" id="swatch-1-s" type="radio"
                                                            name="option-1" value="S">
                                                        <label class="swatchLbl medium rectangle" for="swatch-1-s"
                                                            title="S">S</label>
                                                    </div>
                                                    <div data-value="M" class="swatch-element m available">
                                                        <input class="swatchInput" id="swatch-1-m" type="radio"
                                                            name="option-1" value="M">
                                                        <label class="swatchLbl medium rectangle" for="swatch-1-m"
                                                            title="M">M</label>
                                                    </div>
                                                    <div data-value="L" class="swatch-element l available">
                                                        <input class="swatchInput" id="swatch-1-l" type="radio"
                                                            name="option-1" value="L">
                                                        <label class="swatchLbl medium rectangle" for="swatch-1-l"
                                                            title="L">L</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Action -->
                                            <div class="product-action clearfix">
                                                <div class="product-form__item--quantity">
                                                    <div class="wrapQtyBtn">
                                                        <div class="qtyField">
                                                            <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                                    class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                            <input type="text" id="Quantity" name="quantity" value="1"
                                                                class="product-form__input qty">
                                                            <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                                    class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-form__item--submit">
                                                    <button type="button" name="add" class="btn product-form__cart-submit">
                                                        <span>Add to cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- End Product Action -->
                                        </form>
                                        <div class="display-table shareRow">
                                            <div class="display-table-cell">
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i
                                                            class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add
                                                            to Wishlist</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End-product-single-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Quick View popup-->

@endsection