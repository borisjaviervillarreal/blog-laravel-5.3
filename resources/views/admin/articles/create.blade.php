@extends('layouts.app')

@section('title','Crear Articulo')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				    <div class="panel-heading">Crear Articulo</div>
				    <div class="panel-body">
				    	{!! Form::open(['route'=>'articles.store','method'=>'POST','files'=>true]) !!}
							<div class="form-group">
								{!! Form::label('title','Titulo')!!}
							</div>
							<div class="form-group">
								{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del Articulo','required'])!!}
							</div>
							<div class="form-group">
								{!! Form::label('category_id','Categoria')!!}
							</div>
							<div class="form-group">
								{!! Form::select('category_id', $categories, null, ['class'=>'form-control select-category','required'])!!}
							</div>
							<div class="form-group">
								{!! Form::label('content','Contenido') !!}
							</div>
							<div class="form-group">
								{!! Form::textarea('content',null,['class'=>'form-control text-area-content'])!!}
							</div>
							<div class="form-group">
								{!! Form::label('image','Imagen')!!}
								{!! Form::file('image')!!}
							</div>
							<div class="form-group">
								{!! Form::label('tags','Tags')!!}
								{!! Form::select('tags[]', $tags, null, ['class'=>'form-control select-tag', 'multiple', 'required'])!!}
							</div>
							<div class="form-group">
								{!! Form::submit('Crear Articulo', ['class'=>'btn btn-primary'])!!}
							</div>
							
				    	{!! Form::close() !!}
				    </div>
			</div>
		</div>
	</div>
</div>	
@endsection

@section('chosen-js')
<script>
	$(".select-tag").chosen({
		placeholder_text_multiple:'Seleccione un maximo de tres tags...',
		max_selected_options: 3,
		search_contains: true,
		no_results_text: "Oops, no se ha enocntrado ningun tag!"
	});		

	$(".select-category").chosen({
		placeholder_text_single:'Seleccione una categoria..'
	}); 

	$(".text-area-content").trumbowyg();
</script>
@endsection

