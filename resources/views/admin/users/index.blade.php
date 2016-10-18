@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Lista de Usuarios</div>
				    <div class="panel-body">
						<a href="{{route('users.create')}}" class="btn btn-info">Registrar nuevo usuario</a><hr>
						<table class="table table-striped">
							<thead>
								<th>ID</th>
								<th>Nombre</th>
								<th>Correo Electronico</th>
								<th>Tipo</th>
								<th>Accion</th>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{$user->id}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>
											@if($user->type == "admin")
											<span class="label label-danger">{{$user->type}}</span>
											@else
											<span class="label label-primary">{{$user->type}}</span>
											@endif
										</td>
										<td><a href="{{route('users.destroy', $user->id)}}" onclick="return confirm('Esta seguro que desea eliminar el registro')" class="glyphicon glyphicon-trash btn btn-danger" title="Eliminar"></a> <a href="{{route('users.edit', $user->id)}}" class="glyphicon glyphicon-wrench
					 btn btn-primary" title="Editar"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div class="text-center">
							{!!$users->render()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection