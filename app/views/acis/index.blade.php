@extends('layouts.main')


@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">ACIs</h1>
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
				


				@if($acis->isEmpty())
		<p>No hay Acis aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Descripción</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($acis as $aci)
						<tr>
							<td>{{$aci->id}}</td>
							<td>{{$aci->nombre}}</td>
							<td>{{$aci->descripcion}}
							</td>
							<td>

								{{HTML::link('acis/'.$aci->id, 'Ver ACI', ['class' => 'btn btn-small btn-warning'])}}

								{{HTML::link('acis/'.$aci->id.'/edit', 'Editar ACI', ['class' => 'btn btn-small btn-success'])}}

								{{Form::open(['url' => 'acis/'.
									$aci->id, 'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar ACI', ['class' => 'btn btn-danger'])}}
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
		{{HTML::link('acis/create', 'Nuevo ACI', 
		['class' => 'btn btn-primary'])}}
	</div>



			</div>
		</div>
	</div>
@stop