@extends('layouts.app')

@section('title','Editar Tag')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Editar Tag: {!! $tag->name !!}</div>
				    <div class="panel-body">
					{!! Form::open(['route'=>array('tags.update',$tag->id), 'method'=>'PUT'])!!}
						<div class="form-group">
							{!! Form::label('name','Nombre del Tag')!!}
						</div>
						<div class="form-group">
							{!! Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Nombre del tag','required'])!!}
						</div>
						<div class="form-group">
							{!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}
						</div>

					{!! Form::close() !!}
				</div>							
			</div>
		</div>
	</div>
</div>

@endsection