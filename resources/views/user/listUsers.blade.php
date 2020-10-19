@extends('layout.layout') 

@section('content') 

<div class="section">
	<div class="container">
	   <div class="row">
      <div class="col-md-12">
        <div class="card card-signin my-5">
            <a href="{{route('users.create')}}">Crear Vendedor <i class="fa fa-plus" style="color: #D10024;"></i></a>
          <div class="card-body text-center">
            <h4>Lista de usuarios</h4>  
            <br>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($users as $user) 		
                  <tr>
                    <td><img src="{{asset($user->img)}}" width="100px"></td>
          				  <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->is_admin == 3)
          				  <td>{{$user->is_admin == 3 ? 'Cliente' : ''}}</td>
                    @else
                    <td>{{$user->is_admin == 1 ? 'Administrador' : 'Vendedor'}}</td>
                    @endif
          				  <td>
          				  	<a href="{{route('users.edit',$user->id)}}"><i class="fa fa-pencil" style="color: #333;"></i></a>
                      <a href="{{route('users.show',$user->id)}}"><i class="fa fa-eye"></i> </a>
          				  	<a href="{{route('users.destroy',$user->id)}}"><i class="fa fa-trash" style="color: #D10024;"></i></a>
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
    {{ $users->links() }}
  </div>
</div>

@endsection
