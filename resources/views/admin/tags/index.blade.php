@extends('layouts.app')

@section('title','Listado de Tags')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Lista de Tags</div>
				    <div class="panel-body">
							<a href="{{route('tags.create')}}" class="btn btn-info">Crear Nuevo Tag</a>
							<!-- BUSCADOR DE TAGS -->
								{!! Form::open(['route'=>'tags.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
									<div class="input-group">
										{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Buscar tag...', 'aria-describedby'=>'search']) !!}
										<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
									</div>
								{!! Form::close()!!}
								<hr>
							<!-- FIN DEL BUSCADOR -->
								<table class="table table-striped">
									<thead>
										<th>ID</th>
										<th>Nombre del Tag</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										@foreach($tags as $tag)
											<tr>
												<td>{{$tag->id}}</td>
												<td>{{$tag->name}}</td>
												<td><a href="{{route('tags.destroy',$tag->id)}}" onclick="return confirm('Esta seguro que desea eliminar el tag')" class="glyphicon glyphicon-trash btn btn-danger" title="Eliminar"></a> <a href="{{route('tags.edit',$tag->id)}}" class="glyphicon glyphicon-wrench
							 btn btn-primary" title="Editar"></a></td>
											</tr>
										@endforeach			
									</tbody>
								</table>
								<div class="text-center">
									{!!$tags->render()!!}
								</div>							
							</div>
						</div>
					</div>
				</div>


@endsection