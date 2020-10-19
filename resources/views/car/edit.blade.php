@extends('layout.layout')

@section('content')
<div class="section">
	<div class="col-md-12 text-center">
		<img src="{{asset($car->img)}}" width="200">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="billing-details">
					<form method="POST" action="{{ route('cars.update',$car->id) }}" enctype="multipart/form-data">
						@csrf
						@method('PATCH')
						<br>
						<div class="form-group">
                            <div class="col-md-6">
								<h4 class="product-name">Imagen</h4>
								<input type="file" class="input" name="img" value="">
								@error('img')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
							</div>
                            <div class="col-md-6">
								<h4 class="product-name">Nombre*</h4>
								<input class="input" type="text" name="nombre" value="{{$car->nombre}}">
								@error('nombre')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<h4 class="product-name">Marca*</h4>
								<select class="input" name="marca">
	                                	<option value="">Seleccionar...</option>
	                                	<option value="{{$car->marca}}" {{$car->marca == 'mazda' ? 'selected' : ''}}>Mazda</option>
										<option value="{{$car->marca}}" {{$car->marca == 'ford' ? 'selected' : ''}}>Ford</option>
										<option value="{{$car->marca}}" {{$car->marca == 'renault' ? 'selected' : ''}}>Renault</option>
	                            </select>
								@error('marca')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror	
	                        </div>	
							<div class="col-md-6">
								<h4 class="product-name">Precio*</h4>
								<input class="input" type="text" name="precio" value="{{$car->precio}}">
								@error('precio')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
                        	</div>
						</div>
						<div class="form-group">
	                        <div class="col-md-6">
	                        	<br><br>
		            			<button class="cart-bottom" style="background-color:#333">Actualizar</button>
		            		</div>
	            		</div>
	            	</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
