@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Pagos</h1>
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
		
		{{HTML::link('pagos/create', 'Nuevo Pago', 
		['class' => 'btn btn-primary'])}}
		<hr>
	</div>

	@if($pagos->isEmpty())
		<p>No hay Pagos aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>Empleado</td>
						<td>Concepto</td>
						<td>Importe</td>
						<td>Estado</td>
						<td>Fecha</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($pagos as $pago)
						<?php 
							$estado = EstadosPago::find($pago->estadospago_id);

							if($estado->nombre == 'Pendiente'){
								echo '<tr class="danger">';
							}else{
								echo '<tr>';
							}

			 			?>
			 			<td>
							<?php 
								$empleado = User::find($pago->empleado_id);
								if($empleado != null){
									echo $empleado->nombre 
									.' '. $empleado->apellidos;
								}
							 ?>
						</td>
						<td>
							{{$pago->concepto}}
						</td>
						<td>
							$ {{$pago->importe}}
						</td>	
						<td>
							<?php 
							$estado = EstadosPago::find($pago->estadospago_id);
							if($estado != null){
								echo $estado->nombre;
							}

							 ?>
						</td>
						<td>{{$pago->updated_at}}</td>
						<td>

								{{HTML::link('pagos/'.$pago->id, 'Ver Pago', ['class' => 'btn btn-small btn-warning'])}}

								{{HTML::link('pagos/'.$pago->id.'/edit', 'Editar Pago', ['class' => 'btn btn-small btn-success'])}}

								{{Form::open(['url' => 'pagos/'.
									$pago->id, 'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar Pago', ['class' => 'btn btn-danger'])}}
								{{Form::close()}}

						</tr>	
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	@endif

	


	</div><!-- Fin de container -->


@stop