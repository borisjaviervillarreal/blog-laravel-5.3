@extends('layouts.app')


@section('title', 'Editar Categoria')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Editar Categoria: {!!$category->name!!}</div>
				    <div class="panel-body">
						{!! Form::open(['route' => array('categories.update', $category->id), 'method'=>'PUT']) !!}

							<div class="form-group">
								{!! Form::label('name','Nombre')!!}
								{!! Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Nombre de la Categoria','required']) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
							</div>

						{!!Form::close()!!}
				</div>							
			</div>
		</div>
	</div>
</div>

@endsection