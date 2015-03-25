@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Consultas telefónicas</h1>
		<hr>
	</div>
	
	<div class="container">
		
		<div class="row">
		<div class="col-md-8">
			@if($errors->has())
			<div class="alert alert-danger col-md-offset-2">
				@foreach($errors->all('<p>:message</p>') as $message)
					{{ $message }}
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
	

	<!-- El botón para crear una nueva categoria -->
	<div class="row">
		
		{{HTML::link('telefonicas/create', 'Nueva Consulta Telefónica', 
		['class' => 'btn btn-primary'])}}
		<hr>
	</div>

	@if($telefonicas->isEmpty())
		<p>No hay Consultas Telefónicas aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>Asistente</td>
						<td>Cliente</td>
						<td>Fecha</td>
						<td>Lugar</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($telefonicas as $telefonica)
						<tr>
							<td>
							<?php $asistente = User::find($telefonica->asistente_id);
							 ?>
							 {{$asistente->apellidos}}, {{$asistente->nombre}}
							</td>
							<td>
								{{$telefonica->user_id}}
	 
							</td>
							<td>{{$telefonica->created_at}}</td>
							<td>{{$telefonica->lugar}}</td>
							<td>

								{{HTML::link('telefonicas/'.$telefonica->id, 'Ver Consulta', ['class' => 'btn btn-xs btn-warning'])}}

								{{HTML::link('telefonicas/'.$telefonica->id.'/edit', 'Editar Consulta', ['class' => 'btn btn-xs btn-success'])}}

								{{Form::open(
									['url' => 'telefonicas/'.$telefonica->id, 
									'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar Consulta', ['class' => 'btn btn-xs btn-danger'])}}
								{{Form::close()}}

								

							</td>	

						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	@endif

	


	</div><!-- Fin de container -->


@stop