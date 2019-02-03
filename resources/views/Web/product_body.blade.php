@extends('Web.layout')

@section('body')
@include('Web.slider')     
<!-- featured product area start -->
<div class="page-section pt-100 pb-14 pt-sm-60 pb-sm-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center pb-44">
                    <p>The latest featured products</p>
                    <h2>Featured products</h2>
                </div>
            </div>
        </div>
        <div class="row product-carousel-one spt slick-arrow-style" data-row="2">
          @foreach($products as $product)
            <div class="col">
                <div class="product-item mb-20">
                    <div class="product-thumb">
                        <a href="product-details/{{$product->id}}">
                            <!--asset('bower_components/web/assets/img/product/product-ac1.jpg-->
                            <img src="{{asset('storage/images/'.$product->product_image)}}" alt="product image" width="200px">
                        </a>
                        <div class="box-label">
                            <div class="product-label new">
                                <span>new</span>
                            </div>
                            <div class="product-label discount">
                                <span>PV {{$product->product_pv_value}}</span>
                            </div>
                        </div>
                        <div class="product-action-link">
                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                    data-toggle="tooltip" data-placement="left" title="Quick view"><i class="ion-ios-eye-outline"></i></span> </a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                    class="ion-ios-loop"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                    class="ion-ios-shuffle"></i></a>
                        </div>
                    </div>
                    <div class="product-description text-center">
                        <div class="manufacturer">
                            <p><a href="product-details.html">Electronic items</a></p>
                        </div>
                        <div class="product-name">
                            <h3><a href="product-details/{{$product->id}}" style="color: #3399ff">{{$product->product_name}}</a></h3>
                        </div>
                        <div class="price-box">
                            <span class="regular-price">Rs.{{$product->product_price}}.00</span>
                            <!--<span class="old-price"><del>$120.00</del></span>-->
                        </div>
                        <div class="product-btn">
           
                            <a href="{{url('cart/add/')}}/{{$product->id}}"><i class="ion-bag"></i>Add to cart</a>
                        </div>
                        <div class="hover-box text-center">
                            <div class="ratings">
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach



        </div>
    </div>
</div>
<!-- featured product area end -->

<!-- banner statistics 04 start -->
<div class="banner statistic-four">
    <div class="container">
        <div class="row">
            <div class="col1 col-sm-6">
                <div class="img-container img-full fix">
                    <a href="#">
                        <img src="{{asset('bower_components/web/assets/img/banner/cms_4.1.jpg')}}" alt="banner image">
                    </a>
                </div>
            </div>
            <div class="col3 col">
                <div class="img-container img-full fix mb-30">
                    <a href="#">
                        <img src="{{asset('bower_components/web/assets/img/banner/cms_4.2.jpg')}}" alt="banner image">
                    </a>
                </div>
                <div class="img-container img-full fix">
                    <a href="#">
                        <img src="{{ asset('bower_components/web/assets/img/banner/cms_4.3.jpg')}}" alt="banner image">
                    </a>
                </div>
            </div>
            <div class="col2 col-sm-6">
                <div class="img-container img-full fix mt-sm-30">
                    <a href="#">
                        <img src="{{ asset('bower_components/web/assets/img/banner/cms_4.4.jpg')}}" alt="banner image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection