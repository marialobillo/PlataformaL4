<?php 


class AccountController extends BaseController{


	//mostramos el formulario de crear una cuenta, para todos los publicos
	public function getCreate(){

		return View::make('account.create');
	}

	//recogemos lo que el formulario nos envía, el de crear cuenta
	public function postCreate(){

		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->fails()){
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();
		}else{
			//Si los campos son válidos, creamos la cuenta
			$code = str_random(60);
			$username = Input::get('nombre');
			$email = Input::get('email');

			$user = new User();
			$user->email = Input::get('email');
			$user->nombre = Input::get('nombre');
			$user->apellidos = Input::get('apellidos');
			$user->password = Hash::make(Input::get('password'));
			//campos nuevos
			$user->direccion = Input::get('direccion');
			$user->localidad = Input::get('localidad');
			$user->provincia = Input::get('provincia');
			$user->cedula = Input::get('cedula');
			$user->pais = Input::get('pais');
			//campos
			$user->code = $code;
			$user->active = 0;
			//El role_id!!!
			$role_cliente = Role::where('nombre', '=', 'Cliente')->firstOrFail();
			$user->role_id = $role_cliente->id; 

			$user->save();

			if($user){

				//Creamos el Pago Pendiente de PAL
				//Buscamos el ide de tarifa PAL
				$tarifa = Tarifa::where('nombre', '=', 'PAL')->get();
				foreach($tarifa as $key => $tar){
						$tarifaPal =  $tar->id;
				}				

				$pago = new Pago;


				//Enviar el email de activación
				Mail::send('emails.auth.activate', [
					'link' => URL::route('account-activate', $code),
					'username' => $username
				],
				function($message) use ($user){
					$message->to($user->email, $user->username)
						->subject('Activación de Cuenta');
				});

				return Redirect::route('home')
					->with('global', 'Cuenta Creada. Te hemos enviado un correo para activar tu usuario.');
			}
		}
	}


	//el código de activacion de la cuenta

	public function getActivateIn($code){

		$user = User::where('code', '=', $code)
			->where('active', '=', '0')->get();

		if($user->count()){

			$user = $user->first();

			//Actualizamos el usuario, lo activamos
			$user->active = 1;
			$user->code = '';

			if($user->save()){

				return Redirect::route('home')
					->with('global', 'Cuenta Activada. Puedes Acceder a tu Cuenta.');
			}
		}

		
	}
	
	public function getActivate($code){

		//obtenemos el user mediante el codigo y que aún no se haya activado
		$user = User::where('code', '=', $code)
			->where('active', '=', '0');

		if($user->count()){

			$user = $user->first();

			//Actualizamos el usuario, activado
			$user->active = 1;
			$user->code = '';

			if($user->save()){

				return Redirect::route('home')
					->with('global', 'Cuenta Activada. Puedes Acceder a tu Cuenta.');
			}
		}

		return Redirect::route('home')
			->with('global', 'No hemos podido activar su cuenta. Inténtelo de nuevo.');
	}


	//Acceso a la cuenta
	//mostramos el formulario de login o acceso a su cuenta
	public function getSignin(){

		return View::make('account.signin');
	}

	//lo que recogemos el formulario de login
	public function postSignin(){

		$validator = Validator::make(Input::all(), [
			'email' => 'required',
			'password' => 'required'
		]);

		if($validator->fails()){

			//redireccionamos al inicio, ha fallado
			return Redirect::route('account-signin')
				->withErrors($validator)
				->withInput();
		}else{

			$remember = (Input::has('remember')) ? true : false;

			
			$auth = Auth::attempt([
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => 1
			], $remember);

			if($auth){
				
				//Vamos al home
				return Redirect::intended('/');
				

			}else{

				//Volvemos al formulario de login por fallos
				return Redirect::route('account-signin')
					->with('global', 'Email/Contraseña no son correctos o cuenta no activada')
					->withInput();
			}
		}

		//Si todo falla
		return Redirect::route('account-signin')
			->with('global', 'Hay un problema al acceder. Tiene activa su cuenta?');
	}

	//Cerrar la sesión
	public function getSignout(){

		Auth::logout();
		if(!Auth::check()){
			return Redirect::route('account-signin');
		}
		
	}


	//Mostramos el perfil del cliente con capacidad de modificación
	public function getPerfil(){

		return View::make('account.perfil');
	}

	public function postPerfil(){

		$id = Auth::user()->id;

		

		$validator = Validator::make(Input::all(), User::$rules_edit);

		if($validator->fails()){

			return Redirect::route('account-perfil')
				->withErrors($validator);
		}else{

			$user = User::find(Auth::user()->id);

			$user->nombre = Input::get('nombre');
			$user->apellidos = Input::get('apellidos');
			
			$user->direccion = Input::get('direccion');
			$user->localidad = Input::get('localidad');
			$user->provincia = Input::get('provincia');
			$user->cedula = Input::get('cedula');
			$user->pais = Input::get('pais');

			if($user->save()){
				//Guarda correctamente
				return Redirect::route('home')
					->with('global', 'Los cambios en su perfil se guardaron correctamente.');
			}else{
				//Hubo fallo, vuelva a intentarlo más tarde
				return Redirect::route('account-perfil')
					->with('global', 'Se ha producido un error, vuelva a intentarlo en otro momento. Gracias');
			}
		}
	}


	//Vamos a cambiar la contraseña desde la cuenta!!!
	//Cambiamos la contraseña, muestra formulario
	public function getChangePassword(){

		return View::make('account.password');
	}

	
	//lo que se recibe del formulario para cambiar la contraseña
	public function postChangePassword(){

		$validator = Validator::make(Input::all(), [
			'old_password' => 'required',
			'password' => 'required|min:6',
			'password_again' => 'required|same:password'
		]);

		if($validator->fails()){

			return Redirect::route('account-password')
				->withErrors($validator);
			echo "Falla";
		}else{

			//cambiar la contraseña
			$user = User::find(Auth::user()->id);

			$old_password = Input::get('old_password');
			$password = Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())){

				//password user provider
				$user->password = Hash::make($password);

				if($user->save()){

					return Redirect::route('home')
						->with('global', 'Contraseña cambiada.');
				}else{

					return Redirect::route('account-password')
						->with('global', 'La contraseña antigua no es válida');
				}
			}

			echo "Y no cambia nada";
		}

		return Redirect::route('account-password')
			->with('global', 'La contraseña no pudo cambiarse');
	}

	//mostramos la vista para recordar la contraseña
	public function getForgotPassword(){

		return View::make('account.forgot');
	}

	//lo que recoge el formulario de recordar la contraseña
	public function postForgotPassword(){

		$rules = ['email' => 'required|email'];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

			return Redirect::route('account-forgot-password')
				->withErrors($validator)
				->withInput();
		}else{

			//cambiar contaseña
			$user = User::where('email', '=', Input::get('email'));

			if($user->count()){

				$user = $user->first();

				//Generar un nuevo código
				$code = str_random(60);
				$password = str_random(10);

				$user->code = $code;
				$user->password_temp = Hash::make($password);

				if($user->save()){

					Mail::send('emails.auth.forgot', [
						'link' => URL::route('account-recover', $code),
						'username' => $user->username, 
						'password' => $password
					], function($message) use ($user){
						$message->to($user->email, $user->username)
							->subject('Su nueva contraseña');
					});

					return Redirect::route('home')
						->with('global', 'Le hemos enviado la nueva contraseña a su Email');
				}
			}
		}

		return Redirect::route('account-forgot-password')
			->with('global', 'No se ha podido cambiar la contraseña.');
	}


	//recover la contraseña
	public function getRecover($code){

		$user = User::where('code', '=', $code)
			->where('password_temp', '!=', '');

		if($user->count()){

			$user = $user->first();

			$user->password = $user->password_temp;
			$user->password_temp = '';
			$user->code = '';

			if($user->save()){

				//funcionalidad adicional
				return Redirect::route('home')
					->with('global', 'Puedes acceder a tu cuenta con tu nueva contaseña');
			}

			return Redirect::route('home')
				->with('global', 'No se ha podido recuperar su cuenta.');
		}
	}




}


 ?>