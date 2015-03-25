@extends('layouts.main')


@section('contenido')

<div class="container">
	<div class="row">
	<div class="jumbotron">
		<h1 class="text-center">Editar Pago</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		@if($errors->has())
			<div class="alert alert-danger col-md-offset-2">
				@foreach($errors->all('<p>:message</p>') as $message)
					{{$message}}
				@endforeach
			</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="form">
			{{Form::model($pago, ['method' => 'PATCH', 
				'route' => ['pagos.update', $pago->id]
				]
				)}}
			<div class="form-group">
				{{Form::label('estadospago_id', 'Estado')}}
				{{Form::select('estadospago_id', $estados, null, ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('empleado_id', 'Empleado')}}
				{{Form::select('empleado_id', $empleados,null,['class' => 'form-control'])}}
			</div>
			
			<div class="form-group">
				{{Form::label('nomina_id', 'Nómina')}}
				{{Form::select('nomina_id', $nominas,null,['class' => 'form-control'])}}
			</div>

			
			<div class="form-group">
				{{Form::label('concepto', 'Concepto')}}
				{{Form::text('concepto', Input::old('concepto'), ['class' => 'form-control'])}}
			</div>
			

			

			<div class="row">
				<div class="col-md-5">
					{{Form::submit('Editar Pago ', ['class' => 'btn btn-primary'])}}
				</div>
				<div class="col-md-5">
					{{HTML::link('pagos', 'Cancelar', ['class' => 'btn btn-success'])}}
				</div>

			</div>
			
			{{Form::close()}}

			
		</div>
	</div>
</div>
</div>



@stop