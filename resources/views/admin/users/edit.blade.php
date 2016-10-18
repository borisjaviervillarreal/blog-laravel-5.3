@extends('layouts.app')


@section('title', 'Editar Usuario')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Editar Usuario: {!!$user->name!!}</div>
				    <div class="panel-body">
					{!! Form::open(['route' => array('users.update', $user->id), 'method'=>'PUT']) !!}

						<div class="form-group">
							{!!Form::label('name', 'Nombre')!!}
							{!!Form::text('name', $user->name, ['class' => 'form-control','placeholder'=>'Nombres Completos', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('email', 'Correo Electronico')!!}
							{!!Form::email('email', $user->email, ['class' => 'form-control','placeholder'=>'example@gmail.com', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('type','Tipo')!!}
							{!!Form::select('type', ['member'=>'Miembro', 'admin'=>'Administrador'], $user->type, ['class'=>'form-control'])!!}
						</div>

						<div class="form-group">
							{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
						</div>

					{!!Form::close()!!}					
				</div>
			</div>
		</div>
	</div>
</div>


@endsection