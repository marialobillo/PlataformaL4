@extends('layouts.main')


@section('contenido')
	
	<div class="jumbotron">
		<h1 class="text-center">
			Consulta Telefónica: 
			<?php 
				$cliente = User::find($telefonica->user_id);
			 ?>
			 {{$cliente->nombre}}
		</h1>
	</div>

	<div class="container">
		
		{{HTML::link('telefonicas', 'Volver A Consultas Telefónicas', 
		['class' => 'btn btn-success'])}}

		<hr>
		
		<div class="row">
			<div class="col-md-8">
				<p>
					<strong>Asistente:</strong>
					<p>
						<?php 
						$asistente = User::find($telefonica->asistente_id);
						 ?>
						 {{$asistente->nombre}} {{$asistente->apellidos}}
					</p>
				</p>
				<p>
					<strong>Lugar:</strong>
					<p>{{$telefonica->lugar}}</p>
				</p>
				<p>
					<strong>Información:</strong>
					<p>{{$telefonica->informacion}}</p>
				</p>
				<p>
					<strong>Observaciones:</strong>
					<p>{{$telefonica->observaciones}}</p>
				</p>
				<p>
					<strong>Anexos:</strong>
					<p>{{$telefonica->anexos}}</p>
				</p>
				<p>
					<strong>Firma:</strong>
					<p>{{$telefonica->firma}}</p>
				</p>
				<p>
					<strong>Fecha</strong>
					<p>{{$telefonica->created_at}}</p>
				</p>
			</div>
		</div>


	</div>


@stop