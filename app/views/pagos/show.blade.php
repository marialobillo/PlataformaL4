@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">
			Pago: {{$pago->concepto}}
		</h1>
	</div>

	<div class="container">
		
		<div class="row">
		<div class="col-md-10">
			<strong>Concepto:</strong>
			<p>{{$pago->concepto}}</p>
			<strong>Importe:</strong>
			<p>{{$pago->importe}}</p>
			<strong>Fecha:</strong>
			<p>{{$pago->created_at}}</p>
			<strong>Usuario:</strong>
			<p>{{$pago->user_id}}</p>
			<strong>Cedula</strong>
			<p>{{$pago->cedula}}</p>
			<strong>Estado</strong>
			<p>
			<?php 
				$estado = EstadosPago::find($pago->estadospago_id);
			 ?>
			 {{ $estado->nombre}}
			</p>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-md-6">
			{{HTML::link('pagos', 'Volver a Pagos', ['class' => 'btn btn-warning'])}}
		</div>
	</div>


	</div>
@stop