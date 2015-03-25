@extends('layouts.main')

@section('contenido')

<div class="row">
	<div class="jumbotron">
		<h1 class="text-center">Nueva Tarifa</h1>
	</div>
</div>

<div class="container">
	
	<!-- Aqui pondremos los mensajes que haya -->
<div class="row">
	<div class="col-md-6">
		@if($errors->has())
			<div class="alert alert-danger col-md-offset-2">
				@foreach($errors->all('<p>:message</p>') as $message)
					{{$message}}
				@endforeach
			</div>
		@endif
		@if (Session::has('message'))
    			<div class="alert alert-info col-md-offset-2">
    				{{ Session::get('message') }}
    			</div>
			@endif
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="form">
			
			{{Form::open(['url' => 'tarifas'])}}
			<div class="form-group">
				{{Form::label('nombre', 'Nombre')}}
				{{Form::text('nombre', Input::old('nombre'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('descripcion', 'Descripción')}}
				{{Form::text('descripcion', Input::old('descripcion'),['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('importe', 'Importe')}}
				{{Form::text('importe', Input::old('importe'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('impuesto', 'Impuesto')}}
				{{Form::text('impuesto', Input::old('impuesto'), ['class' => 'form-control'])}}
			</div>
			
			{{Form::submit('Guarda Tarifa', 
				['class' => 'btn btn-success'])}}


			{{Form::close()}}
		</div>
	</div>
</div>

</div>

@stop