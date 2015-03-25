@extends('layouts.main')


@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Estados de Pago</h1>
	</div>

	<!-- Lo usaremos para mostrar mensajes -->
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

	<!-- El contenido de la web -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				


				@if($estadospagos->isEmpty())
		<p>No hay Estados de Pago aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($estadospagos as $estadospago)
						<tr>
							<td>{{$estadospago->id}}</td>
							<td>{{$estadospago->nombre}}</td>
							
							<td>


								{{HTML::link('estadospagos/'.$estadospago->id.'/edit', 'Editar Estado', ['class' => 'btn btn-small btn-success'])}}

								{{Form::open(['url' => 'estadospagos/'.
									$estadospago->id, 'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar Estado', ['class' => 'btn btn-danger'])}}
								{{Form::close()}}

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	@endif

	<!-- El botón para crear una nueva categoria -->
	<div class="row">
		<hr>
		{{HTML::link('estadospagos/create', 'Nuevo Estado', 
		['class' => 'btn btn-primary'])}}
	</div>



			</div>
		</div>
	</div>
@stop