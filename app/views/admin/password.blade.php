@extends('layouts.main')

@section('contenido')

	<div class="row">
		<div class="jumbotron">
			<h1 class="text-center">Cambiar Contraseña</h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				<div class="form">
					{{Form::open(['route' => 'admin-password-post'])}}
					<div class="form-group">
					{{Form::label('old_password', 'Contraseña Anterior')}}	
					{{Form::password('old_password', ['class' => 'form-control'])}}
					@if($errors->has('old_password'))
						{{$errors->first('old_password')}}
					@endif
					</div>
					<div class="form-group">
					{{Form::label('password', 'Nueva Contraseña')}}	
					{{Form::password('password', ['class' => 'form-control'])}}
					@if($errors->has('old_password'))
						{{$errors->first('old_password')}}
					@endif
					</div>
					<div class="form-group">
					{{Form::label('password_again', 'Repita la Nueva Contraseña')}}
					{{Form::password('password_again', 
						['class' => 'form-control'])}}
					@if($errors->has('password_again'))
						 <div class="panel panel-danger"> 
						 	<div class="panel-heading">
						 		{{$errors->first('password_again')}}	
						 	</div>
						 </div>
					@endif
					</div>
					{{Form::submit('Cambiar Contraseña', ['class' => 'btn btn-success'])}}
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>

@stop