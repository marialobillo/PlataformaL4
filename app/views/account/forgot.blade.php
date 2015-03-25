@extends('layouts.main')


@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Recuperar Contraseña</h1>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="form">
					{{Form::open(['route' => 'account-forgot-password'])}}
					<div class="form-group">
						{{Form::label('email', 'Escriba su correo electrónico')}}
						{{Form::text('email', Input::old('email'), ['class' => 'form-control'])}}
						@if($errors->has('email'))
							<div class="panel panel-danger">
								<div class="panel-heading">
									{{$errors->first('email')}}
								</div>
							</div>
						@endif
					</div>
					{{Form::submit('Recuperar Contraseña', ['class' => 'boton btn-success'])}}
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>

@stop