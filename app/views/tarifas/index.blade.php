@extends('layouts.main')


@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Tarifas</h1>
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
				

	<!-- El botón para crear una nueva categoria -->
	<div class="row">
		
		{{HTML::link('tarifas/create', 'Nueva Tarifa', 
		['class' => 'btn btn-primary'])}}
		<hr>

	</div>



				@if($tarifas->isEmpty())
		<p>No hay Tarifas aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Total(Impuesto inc.)</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($tarifas as $tarifa)
						<tr>
							<td>{{$tarifa->id}}</td>
							<td>{{$tarifa->nombre}}</td>
							<td>{{$tarifa->total}}
							</td>
							<td>

								{{HTML::link('tarifas/'.$tarifa->id, 'Ver Tarifa', ['class' => 'btn btn-small btn-warning'])}}

								{{HTML::link('tarifas/'.$tarifa->id.'/edit', 'Editar Tarifa', ['class' => 'btn btn-small btn-success'])}}

								{{Form::open(['url' => 'tarifas/'.
									$tarifa->id, 'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar Tarifa', ['class' => 'btn btn-danger'])}}
								{{Form::close()}}

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	@endif

	


			</div>
		</div>
	</div>
@stop