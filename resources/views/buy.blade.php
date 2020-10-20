@extends('layout.layout') 

@section('content') 

<div class="section">
	<div class="container">
	   <div class="row">
      <div class="col-md-12">
        <div class="card card-signin my-5">
          <div class="card-body text-center">
            <h4>Lista de ventas</h4>  
            <br>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nombre vendedor</th>
                    <th scope="col">Nombre auto</th>
                    <th scope="col">Marca auto</th>
                    <th scope="col">Valor venta</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($ventas as $venta) 		
                  <tr>
          				  <td>{{$venta->user->name}}</td>
                    <td>{{$venta->car->nombre}}</td>
                    <td>{{$venta->car->marca}}</td>
                    <td>${{number_format($venta->car->precio)}}</td>
                  </tr>
                	@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{ $ventas->links() }}
  </div>
</div>

@endsection
