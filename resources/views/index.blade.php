@extends('layout.layout')

@section('content')

<div class="section">
    <div class="container">
        <div class="row">

            @if(Session::has('messageApproved'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{Session::get('messageApproved')}}
                </div>
                <script>  localStorage.clear();  </script>
            @endif

            @if(Session::has('messageRejected'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{Session::get('messageRejected')}}
                </div>
            @endif

                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Autos</h3>
                        <hr>
                    </div>
                </div>

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach($cars as $car)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{asset($car->img)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"> </p>
                                            <h3 class="product-name">
                                                <a href="#">{{$car->nombre}}</a>
                                            </h3>
                                            <h4 class="product-price">${{number_format($car->precio)}}</h4>
                                            <del class="product-old-price">${{number_format($car->precio + 100000) }}</del>
                                            <div class="product-btns">
                                                <button class="quick-view"><a href="{{route('cars.show',$car->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">ver</span></a></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn" onclick="addCart({{$car->id}})"><i class="fa fa-shopping-cart"></i> agregar</button>
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
@endsection
