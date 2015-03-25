@extends('layouts.main')


@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Nóminas</h1>
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
				


				@if($nominas->isEmpty())
		<p>No hay Nóminas aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Importe</td>
						<td>Total</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($nominas as $nomina)
						<tr>
							<td>{{$nomina->id}}</td>
							<td>{{$nomina->nombre}}</td>
							<td>{{$nomina->importe}}</td>
							<td>{{$nomina->total}}</td>
							<td>

								{{HTML::link('nominas/'.$nomina->id, 'Ver Nómina', ['class' => 'btn btn-small btn-warning'])}}

								{{HTML::link('nominas/'.$nomina->id.'/edit', 'Editar Nómina', ['class' => 'btn btn-small btn-success'])}}

								{{Form::open(['url' => 'nominas/'.
									$nomina->id, 'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar Nómina', ['class' => 'btn btn-danger'])}}
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
		{{HTML::link('nominas/create', 'Nueva Nómina', 
		['class' => 'btn btn-primary'])}}
	</div>



			</div>
		</div>
	</div>
@stop