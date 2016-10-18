@extends('layouts.app')

@section('title','Listado de Articulos')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Lista de Articulos</div>
				    <div class="panel-body">
				    	<a href="{{route('articles.create')}}" class="btn btn-info">Crear Nuevo Articulo</a>
							<!-- BUSCADOR DE ARTICULOS -->
								{!! Form::open(['route'=>'articles.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
									<div class="input-group">
										{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Buscar Articulo...', 'aria-describedby'=>'search']) !!}
										<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
									</div>
								{!! Form::close()!!}
								<hr>
							<!-- FIN DEL BUSCADOR -->
						<table class="table table-striped">
							<thead>
								<th>Id</th>
								<th>Titulo</th>
								<th>Categoria</th>
								<th>User</th>
								<th>Acction</th>
							</thead>
							<tbody>
								@foreach($articles as $article)
								<tr>
									<td>{{$article->id}}</td>
									<td>{{$article->title}}</td>
									<td>{{$article->category->name}}</td>
									<td>{{$article->user->name}}</td>
									<td><a href="{{route('articles.destroy',$article->id)}}" onclick="return confirm('Esta seguro que desea eliminar el articulo')" class="glyphicon glyphicon-trash btn btn-danger" title="Eliminar"></a> <a href="{{route('articles.edit', $article->id)}}" class="glyphicon glyphicon-wrench
							 btn btn-primary" title="Editar"></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="text-center">
							{!! $articles->render()!!}
						</div>
				    </div>
			</div>
		</div>
	</div>
</div>	
@endsection