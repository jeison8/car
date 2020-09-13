<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +57-3216616287</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> jeisonhurtado1988@hotmail.com</a></li>
			</ul>
			<ul class="header-links pull-right">
				<!-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
				<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
			</ul>
		</div>
	</div>

	<!-- MAIN HEADER -->
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="header-logo">
						<a href="{{route('store.index')}}" class="logo">
							<img src="{{asset('img/logo.png')}}" alt="">
						</a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="header-search">
						<form>
							<select class="input-select">
								<option value="0">All Categories</option>
								<option value="1">Category 01</option>
								<option value="1">Category 02</option>
							</select>
							<input class="input" placeholder="Search here">
							<button class="search-btn">Search</button>
						</form>
					</div>
				</div>
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="cursor: pointer;">
								<i class="fa fa-shopping-cart"></i>
								<span>Carrito</span>
								<div id="qty"><span id="notification"></span></div>
							</a>
							<div class="cart-dropdown">
								<div id="articles" class="cart-list">
									
								</div>
								<div id="bottonEmpty">
									
								</div>
								<div class="cart-summary">	
									<small><span id="items"></span> Articulo(s) seleccionado(s)</small>
									<h5>SUBTOTAL: $<span id="subTotal"></span></h5>
								</div>
								<div class="cart-btns" id="cart-btns">
									@if(strpos(Request::url(),'/cart') == false)
									<a href="#" onclick="viewCart()">Ver Carrito</a>
									<a href="#" onclick="viewOrder()">Crear orden&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{--@include('layout.navigation')--}}

</header>
