@extends('layout.layout')

@section('content')
<div class="section">
	<div class="col-md-12 text-center">
		<img src="{{asset($user->img)}}" width="200">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="billing-details">
					<form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
						@csrf
						@method('PATCH')
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
								<input class="input" type="text" name="name" value="{{$user->name}}">
								@error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<h4 class="product-name">Correo*</h4>
								<input class="input" type="text" name="email" value="{{$user->email}}">
								@error('email')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
                        	</div>
                        	<div class="col-md-6">
								<h4 class="product-name">Contraseña*</h4>
								<input class="input" type="text" name="password" value="">
								@error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
                        	</div>
						</div>
						<div class="form-group">
                        	<div class="col-md-6">
								<h4 class="product-name">Rol*</h4>
								<select class="input" name="is_admin">
	                                	<option value="">Seleccionar...</option>
	                                	<option value="3" {{$user->is_admin == 3 ? 'selected' : ''}}>Cliente</option>
	                                	<option value="2" {{$user->is_admin == 2 ? 'selected' : ''}}>Vendedor</option>
										<option value="1" {{$user->is_admin == 1 ? 'selected' : ''}}>Administrador</option>
	                            </select>
								@error('is_admin')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror	
	                        </div>	
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
