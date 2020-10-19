@extends('layout.layout')

@section('content')

		<div class="section">
			<div class="container">
				<div class="row">

					<div class="col-md-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{asset($user->img)}}" alt="">
							</div>
						</div>
					</div>
		
					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$user->name}}</h2>
							<div>
								<h3 class="product-price">{{$user->email}}</h3>
							</div>
							<ul class="product-links">
								<li>Rol:</li>
								<li><a href="#">{{$user->is_admin == 1 ? 'Administrador' :'Vendedor'}}</a></li>
							</ul>
							<ul class="product-links">
								<li><a href="{{route('users.index')}}" style="color:#ef233c; cursor: pointer;">Volver&nbsp;<i class="fa fa-arrow-circle-right"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>

@endsection
