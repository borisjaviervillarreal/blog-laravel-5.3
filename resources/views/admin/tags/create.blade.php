@extends('layouts.app')

@section('title','Listado de Tags')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Crear Nuevo Tag</div>
				    <div class="panel-body">
				    	{!! Form::open(['route'=>'tags.store', 'method'=>'POST'])!!}
							<div class="form-group">
				    			{!! Form::label('name','Nombre')!!}
				    			{!! Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre del tag', 'required'])!!}
							</div>
							<div class="form-group">
								{!! Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
							</div>
				    	{!! Form::close()!!}
				    </div>
			</div>
		</div>
	</div>
</div>	
@endsection

