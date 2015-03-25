@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">
			Nómina: {{$nomina->nombre}}
		</h1>
	</div>

	<div class="container">
		
		<div class="row">
		<div class="col-md-10">
			<strong>Nombre:</strong>
			<p>{{$nomina->nombre}}</p>
			<strong>Descripción:</strong>
			<p>{{$nomina->descripcion}}</p>
			<strong>Importe:</strong>
			<p>{{$nomina->importe}}</p>
			<strong>Tipo de ACI</strong>
			<p>{{$nomina->impuesto}}</p>
			<strong>Nº de ACIs</strong>
			<p>{{$nomina->total}}</p>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-md-6">
			{{HTML::link('nominas', 'Volver a Nóminas', ['class' => 'btn btn-warning'])}}
		</div>
	</div>


	</div>
@stop