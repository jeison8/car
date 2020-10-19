@extends('layout.layout')

@section('content')

		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($car->img)}}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$car->nombre}}</h2>

							<div>
								<h3 class="product-price">${{number_format($car->precio)}} <del class="product-old-price">${{number_format($car->precio + 100000)}}</del></h3>
							</div>

							<div class="add-to-cart">
								<button class="add-to-cart-btn" onclick="addCart(0)"><i class="fa fa-shopping-cart"></i>Agregar al carrito</button>
							</div>

							<ul class="product-links">
								<li>Marca:</li>
								<li><a href="#">{{$car->marca}}</a></li>
							</ul>

							<ul class="product-links">
								<li><a onclick="window.location.href='/'" style="color:#ef233c; cursor: pointer;">SEGUIR COMPRANDO&nbsp;<i class="fa fa-arrow-circle-right"></i></a></li>
							</ul>

						</div>
					</div>
	
				</div>
			</div>
		</div>


@endsection
