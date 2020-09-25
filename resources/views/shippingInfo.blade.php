@extends('layout.layout') 

@section('content')  

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="billing-details">
					<form method="POST" action="{{ route('pasarella.insert-shipping-info',$user->id) }}">
						@csrf
						@method('PATCH') 
						<div id="inputs">
							<input type="hidden" name="total" id="total">
							<input type="hidden" name="number_articles" id="number_articles">
						</div>

						<h3 class="title">DATOS DE ENVIO</h3>
						<br>
						<div class="form-group">
							<h4 class="product-name">Nombre*</h4>
							<input class="input" type="text" name="name" value="{{$user->name}}">
							@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Correo*</h4>
							<input class="input" type="email" name="email" value="{{$user->email}}">
							@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Direccion*</h4>
							<input class="input" type="text" name="address">
							@error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Ciudad*</h4>
							<select class="input" name="city" id="city">
                                	<option value="">Seleccionar...</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
							@error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Telefono*</h4>
							<input class="input" type="tel" name="phone">
							@error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>	
						<div class="form-group">
	            			<button class="cart-bottom" style="background-color:#333">Enviar</button>
	            		</div>
	            	</form>
				</div>
			</div>
				@include('detailOrder')
		</div>
	</div>
@endsection
@push('custom-scripts')
    <script src="{{asset('js/order.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush