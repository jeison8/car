@extends('layout.layout') 

@section('content') 

<div class="section">
	<div class="container">
	   <div class="row">
      <div class="col-md-12">
        <div class="card card-signin my-5">
            <a href="{{route('cars.create')}}">Crear Auto <i class="fa fa-plus" style="color: #D10024;"></i></a>
          <div class="card-body text-center">
            <h4>Lista de Autos</h4>  
            <br>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($cars as $car) 		
                  <tr>
                    <td><img src="{{asset($car->img)}}" width="100px"></td>
          				  <td>{{$car->nombre}}</td>
                    <td>{{$car->marca}}</td>
          				  <td>${{number_format($car->precio)}}</td>
          				  <td>
          				  	<a href="{{route('cars.edit',$car->id)}}"><i class="fa fa-pencil" style="color: #333;"></i></a>
          				  	<a href="{{route('cars.destroy',$car->id)}}"><i class="fa fa-trash" style="color: #D10024;"></i></a>
          				  </td>
                  </tr>
                	@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{ $cars->links() }}
  </div>
</div>

@endsection
