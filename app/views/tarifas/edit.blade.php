@extends('layouts.main')

@section('contenido')
	
	<div class="jumbotron">
		<h2 class="text-center">
			Editar Tarifa : {{$tarifa->nombre}}
		</h2>
	</div>

	<div class="container">
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
		<div class="col-md-8">
			<div class="form">
				{{Form::model($tarifa, ['method' => 'PATCH', 
				'route' => ['tarifas.update', $tarifa->id]
				]
				)}}
				<div class="form-group">
					{{Form::label('nombre', 'Nombre')}}
					{{Form::text('nombre', Input::old('nombre'),['class' => 'form-control'])}}
				</div>
				<div class="form-group">
					{{Form::label('descripcion', 'Descripción')}}
					{{Form::textarea('descripcion', Input::old('descripcion'), ['class' => 'form-control'])}}
				</div>	
				<div class="form-group">
				{{Form::label('importe', 'Importe')}}
				{{Form::text('importe', Input::old('importe'), ['class' => 'form-control'])}}
				</div>
				<div class="form-group">
					{{Form::label('impuesto', 'Impuesto')}}
					{{Form::text('impuesto', Input::old('impuesto'), ['class' => 'form-control'])}}
				</div>
				
			
				{{Form::submit('Editar Tarifa', ['class' => 'btn btn-success'])}}
				{{Form::close()}}
			</div>
		</div>
	</div>
	</div>

@stop