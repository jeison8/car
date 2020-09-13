@extends('layout.layout') 

@section('content')   

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Productos</h3>

                </div>
            </div>

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                            <!-- product -->
                            @foreach($products as $product)
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset($product->img)}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$product->category->name}}</p>
                                        <h3 class="product-name">
                                            <a href="#">{{$product->name}}</a>
                                        </h3>
                                        <h4 class="product-price">${{number_format($product->price)}}</h4>
                                        <del class="product-old-price">${{number_format($product->price + 100000) }}</del>
                                        <div class="product-btns">
                                            <button class="quick-view"><a href="{{route('store.detail',$product->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn" onclick="addCart({{$product->id}})"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /product -->
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        {{-- @include('layout.promotion') --}}

        <!-- NEWSLETTER -->
 <!--        <div id="newsletter" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                            <form>
                                <input class="input" type="email" placeholder="Enter Your Email">
                                <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                            </form>
                            <ul class="newsletter-follow">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /NEWSLETTER -->

@endsection
