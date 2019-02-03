@extends('Web.layout')

@section('body')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="shop-grid-left-sidebar.html">shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product details</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- page main wrapper start -->
<main>
    <div class="product-details-wrapper pt-100 pb-14 pt-sm-58">
        <div class="container">
            <div class="row">
                <div class="col-lg-11" style="height: 700px">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider mb-20 slider-arrow-style slider-arrow-style__style-2">
                                    <div class="pro-large-img img-zoom" id="img1">
                                        <!--{{asset('storage/images/'.$product->product_image)}}-->
                                        <img src="{{asset('storage/images/'.$product->product_image)}}" alt="" />
                                    </div>
                                    <div class="pro-large-img img-zoom" id="img2">
                                        <img src="assets/img/product/product-details-img2.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img img-zoom" id="img3">
                                        <img src="assets/img/product/product-details-img3.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img img-zoom" id="img4">
                                        <img src="assets/img/product/product-details-img4.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img img-zoom" id="img5">
                                        <img src="assets/img/product/product-details-img4.jpg" alt=""/>
                                    </div>
                                </div>
                                <div class="pro-nav slick-padding2 slider-arrow-style slider-arrow-style__style-2">
                                    <div class="pro-nav-thumb"><img src="{{asset('storage/images/'.$product->product_image)}}" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{{asset('storage/images/'.$product->product_image)}}" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{{asset('storage/images/'.$product->product_image)}}" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{{asset('storage/images/'.$product->product_image)}}" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{{asset('storage/images/'.$product->product_image)}}" alt="" /></div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des pt-md-98 pt-sm-58">
                                    <h3>{{$product->product_name}}</h3>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <div class="pro-review">
                                            <span><a href="#">PV value : <span style="font-size: 15px">{{$product->product_pv_value}}</span></a></span>
                                        </div>
                                    </div>
                                    <div class="pricebox">
                                        <span class="regular-price">Rs {{$product->product_price}}.00</span>
                                    </div>
                                    <p>{{$product->product_description}}</p>
                                    <div class="quantity-cart-box d-flex align-items-center mb-24">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="product-btn product-btn__color">
                                            <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="availability mb-20">
                                        <h5>Availability:</h5>
                                        <span>in stock</span>
                                    </div>
                                    <div class="share-icon">
                                        <h5>share:</h5>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->
                  
                    <!-- product details reviews end --> 
                    <!-- featured product area start -->
                 
                    <!-- featured product area end -->
                </div>
         
            </div>
        </div>
    </div>
</main>
<!-- page main wrapper end -->


<!-- footer area start -->

   
    <!-- footer botton area end -->
    @endsection