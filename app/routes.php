<?php


Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@getHome'
]);

Route::group(['before' => 'guest'], function(){

	
	//Para los formularios (POST)
	Route::group(['before' => 'crsf'], function(){

		//recogemos las credenciales del login
		Route::post('account/signin', [
			'as' => 'account-signin-post',
			'uses' => 'AccountController@postSignin'
		]);


		//lo que devuelve el formulario para crear la cuenta
		Route::post('account/create', [
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		]);

		//Recuperar contraseña, se nos olvidó
		Route::post('account/forgot-password', [
			'as' => 'account-forgot-password',
			'uses' => 'AccountController@postForgotPassword'
		]);
	});


	//Acceder a la cuenta (GET)
	Route::get('account/signin', [
		'as' => 'account-signin',
		'uses' => 'AccountController@getSignin'	
	]);

	//Formulario para crear la cuenta(GET)
	Route::get('account/create', [
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	]);

	//Creamos usuario desde el panel de admin y tiene otra funcion de activate(GET)
	Route::get('account/activatein/{code}', [
		'as' => 'account-activate-in',
		'uses' => 'AccountController@getActivateIn'
	]);

	//Activar la cuenta, parte del proceso de crear la cuenta(GET)
	//creamos y activamos cuenta
	Route::get('account/activate/{code}', [
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	]);

	//Recuperar la contraseña, (GET)
	Route::get('/account/forgot-password', [
		'as' => 'account-forgot-password', 
		'uses' => 'AccountController@getForgotPassword'
	]);

	//Recuperar la contraseña, y vuelta a activar con el código
	Route::get('/account/recover/{code}', [
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	]);


});


//Dentro de la cuenta!!!
Route::group(['before' => 'auth|admin'], function(){

	//Loguot de la cuenta, salir(GET)
	Route::get('admin/signout', [
		'as' => 'admin-signout',
		'uses' => 'AdminController@getSignout'
	]);

	//Cambiar la contraseña, desde la cuenta(GET)
	Route::get('admin/password', [
		'as' => 'admin-password',
		'uses' => 'AdminController@getChangePassword'
	]);


	Route::resource('roles', 'RolesController');
	Route::resource('users', 'UsersController');
	Route::resource('telefonicas', 'TelefonicaController');
	Route::resource('tarifas', 'TarifasController');
	Route::resource('pagos', 'PagosController');
	Route::resource('estadospagos', 'EstadosPagosController');
	Route::resource('acis', 'AcisController');
	Route::resource('nominas', 'NominasController');

	/*
	*	Los POST !!!
	*/
	Route::group(['before' => 'crsf'], function(){

		//Lo que recogemos de editar el perfil
		Route::post('admin/perfil', [
			'as' => 'admin-perfil-post', 
			'uses' => 'AdminController@postPerfil'
		]);


		//Para cambiar la contraseña
		Route::post('admin/password', [
		'as' => 'admin-password-post', 
		'uses' => 'AdminController@postChangePassword'
		]);	

	});

});





//Dentro de la cuenta!!!
Route::group(['before' => 'auth|cliente'], function(){

	//Loguot de la cuenta, salir(GET)
	Route::get('account/signout', [
		'as' => 'account-signout',
		'uses' => 'AccountController@getSignout'
	]);

	//Mostramos el perfil
	Route::get('account/perfil', [
		'as' => 'account-perfil',
		'uses' => 'AccountController@getPerfil'
	]);

	//Cambiar la contraseña, desde la cuenta(GET)
	Route::get('account/password', [
		'as' => 'account-password',
		'uses' => 'AccountController@getChangePassword'
	]);


	/*
	*	Los POST !!!
	*/
	Route::group(['before' => 'crsf'], function(){

		//Lo que recogemos de editar el perfil
		Route::post('account/perfil', [
			'as' => 'account-perfil-post', 
			'uses' => 'AccountController@postPerfil'
		]);


		//Para cambiar la contraseña
		Route::post('account/password', [
		'as' => 'account-password-post', 
		'uses' => 'AccountController@postChangePassword'
		]);	

	});




});






//Dentro de la cuenta!!!
Route::group(['before' => 'auth|asistente'], function(){

	//Loguot de la cuenta, salir(GET)
	Route::get('account/signout', [
		'as' => 'account-signout',
		'uses' => 'AccountController@getSignout'
	]);

});


