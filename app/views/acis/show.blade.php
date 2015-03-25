@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">
			ACI: {{$aci->nombre}}
		</h1>
	</div>

	<div class="container">
		
		<div class="row">
		<div class="col-md-10">
			<strong>Nombre:</strong>
			<p>{{$aci->nombre}}</p>
			<strong>Descripción:</strong>
			<p>{{$aci->descripcion}}</p>
			<strong>Nº de Clientes:</strong>
			<p>{{$aci->nclientes}}</p>
			<strong>Tipo de ACI</strong>
			<p>{{$aci->tipoaci}}</p>
			<strong>Nº de ACIs</strong>
			<p>{{$aci->naci}}</p>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-md-6">
			{{HTML::link('acis', 'Volver a ACIs', ['class' => 'btn btn-warning'])}}
		</div>
	</div>


	</div>
@stop