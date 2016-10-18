@extends('layouts.app')

@section('title','Agregar Categoria')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Registrar Nueva Categoria</div>
				    <div class="panel-body">
					{!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
						<div class="form-group">
							{!! Form::label('name','Nombre')!!}
							{!! Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre de la categoria'])!!}			
						</div>
						<div class="form-group">
							{!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
						</div>
					{!! form::close() !!}
					</div>
			</div>
		</div>
	</div>
</div>
@endsection