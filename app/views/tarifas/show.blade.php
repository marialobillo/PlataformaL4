@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">
			Tarifa: {{$tarifa->nombre}}
		</h1>
	</div>

	<div class="container">
		
		<div class="row">
		<div class="col-md-10">
			<strong>Nombre:</strong>
			<p>{{$tarifa->nombre}}</p>
			<strong>Descripción:</strong>
			<p>{{$tarifa->descripcion}}</p>
			<strong>Importe</strong>
			<p>${{$tarifa->importe}}</p>
			<strong>Impuesto(%)</strong>
			<p>{{$tarifa->impuesto}}</p>
			<strong>Total (Importe + Impuesto)</strong>
			<p>${{$tarifa->total}}</p>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-md-6">
			{{HTML::link('tarifas', 'Volver a Tarifas', ['class' => 'btn btn-warning'])}}
		</div>
	</div>


	</div>
@stop