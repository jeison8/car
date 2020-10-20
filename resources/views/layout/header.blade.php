<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a><i class="fa fa-phone"></i> +57-3216616287</a></li>
				<li><a><i class="fa fa-envelope-o"></i> jeisonhurtado1988@hotmail.com</a></li>
			</ul>
			<ul class="header-links pull-right">
				<!-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
                    <!-- Authentication Links -->
                    @guest
                    	<i class="fa fa-user-o" style="color: #D10024;"></i>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesion</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user-o" style="color: #D10024;"></i>{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              
                                @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
	                                <a class="dropdown-item" style="color: #333;" href="{{ route('cars.index') }}">
	                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vehiculos
	                                    <i class="fa fa-list" style="color: #D10024;"></i>
	                                </a>
                                @endif
                                @if(Auth::user()->is_admin == 1)
	                                <a class="dropdown-item" style="color: #333;" href="{{ route('users.index') }}">
	                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedores
	                                    <i class="fa fa-user" style="color: #D10024;"></i>
	                                </a>
								@endif   
                               {{--  <a class="dropdown-item" style="color: #333;" href="{{ route('history.index',Auth::user()->id) }}">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pedidos
                                    <i class="fa fa-shopping-bag" style="color: #D10024;"></i>
                                </a> --}}
                                <a class="dropdown-item" style="color: #333;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cerrar sesion
                                    <i class="fa fa-power-off" style="color: #D10024;"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
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
							<img src="{{asset('img/logo.png')}}" width="100" alt="">
						</a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="header-search">
						<form  method="POST" action="{{route('store.search')}}" onsubmit="validateSearch(event);">
							@csrf
							<select class="input-select" name="categories_id" id="selectCategory">
								<option value="">Seleccione...</option>
								<option value="all">Todos</option>
							</select>
							<input class="input" name="find" id="find" placeholder="Busca aqui">
							<button type="submit" class="search-btn">Buscar</button>
							</script>
						</form>
					</div>
				</div>

				@if(strpos(Request::url(),'/order') == false && strpos(Request::url(),'/shipping-info') == false && strpos(Request::url(),'/re-order') == false)
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
									<h5><span id="subTotal"></span></h5>
								</div>
								<div class="cart-btns" id="cart-btns">
									@if(Auth::check())
									<a href="{{route('store.buy')}}" style="{{Auth::user()->is_admin == 3 ? 'pointer-events: none' : ''}}">Ver ventas</a>
									<a href="#" onclick="viewOrder()"  style="{{Auth::user()->is_admin == 3 ? 'pointer-events: none' : ''}}">Registrar&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif

			</div>
		</div>
	</div>


</header>
