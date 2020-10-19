@extends('layout.layout') 

@section('content') 
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="billing-details">
					<form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
						@csrf
						<br>
						<div class="form-group">
                            <div class="col-md-6">
								<h4 class="product-name">Imagen*</h4>
								<input type="file" class="input" name="img" value="">
								@error('img')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
							</div>
                            <div class="col-md-6">
								<h4 class="product-name">Nombre*</h4>
								<input class="input" type="text" name="nombre" value="{{old('nombre')}}">
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
	                                	<option value="mazda" {{old('marca') == 'mazda' ? 'selected' : ''}}>Mazda</option>
										<option value="ford" {{old('marca') == 'ford' ? 'selected' : ''}}>Ford</option>
										<option value="renault" {{old('marca') == 'renault' ? 'selected' : ''}}>Renault</option>
	                            </select>
								@error('marca')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror	
	                        </div>	
							<div class="col-md-6">
								<h4 class="product-name">Precio*</h4>
								<input class="input" type="number" name="precio" value="{{old('precio')}}">
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
		            			<button class="cart-bottom" style="background-color:#333">Crear</button>
		            		</div>
	            		</div>
	            	</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
