@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')

<div class="container">
	    <div class="row">
        	<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
                	<div class="panel-heading">Registrar Nuevo Usuario</div>
                	<div class="panel-body">
	{!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!!Form::label('name', 'Nombre')!!}
			{!!Form::text('name', null, ['class' => 'form-control','placeholder'=>'Nombres Completos', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('email', 'Correo Electronico')!!}
			{!!Form::email('email', null, ['class' => 'form-control','placeholder'=>'example@gmail.com', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('password', 'Password')!!}
			{!!Form::password('password', ['class' => 'form-control','placeholder'=>'*******', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('type','Tipo')!!}
			{!!Form::select('type',[''=>'Seleccione un nivel','member'=>'Miembro', 'admin'=>'Administrador'], null, ['class'=>'form-control'])!!}
		</div>

		<div class="form-group">
			{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
		</div>

	{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection