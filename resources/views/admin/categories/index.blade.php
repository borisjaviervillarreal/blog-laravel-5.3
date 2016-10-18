@extends('layouts.app')

@section('title','Listado de Categorias')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Lista de Categorias</div>
				    <div class="panel-body">
							<a href="{{route('categories.create')}}" class="btn btn-info">Crear Nueva Categoria</a><hr>
								<table class="table table-striped">
									<thead>
										<th>ID</th>
										<th>Nombre de la categoria</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										@foreach($categories as $category)
											<tr>
												<td>{{$category->id}}</td>
												<td>{{$category->name}}</td>
												<td><a href="{{route('categories.destroy',$category->id)}}" onclick="return confirm('Esta seguro que desea eliminar la categoria')" class="glyphicon glyphicon-trash btn btn-danger" title="Eliminar"></a> <a href="{{route('categories.edit', $category->id)}}" class="glyphicon glyphicon-wrench
							 btn btn-primary" title="Editar"></a></td>
											</tr>
										@endforeach			
									</tbody>
								</table>
								<div class="text-center">
									{!!$categories->render()!!}
								</div>							
			</div>
		</div>
	</div>
</div>


@endsection