<?php

class TelefonicaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$telefonicas = Telefonica::where('eliminado', '=', 0)->get();

		return View::make('telefonicas.index')
			->with('telefonicas', $telefonicas);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//buscamos el id de role cliente
		$role_cliente = Role::where('nombre','=', 'Cliente')->first();
		//var_dump($role_cliente->id);

		$user_clientes = User::where('role_id', '=', $role_cliente->id)->get();
		$clientes = array();
		foreach($user_clientes as $key => $cliente){
			$clientes[$cliente->id] = $cliente->apellidos .', '.$cliente->nombre;
		}

		//y lo mismo hacemos para los asistentes
		$role_asistente = Role::where('nombre','=', 'Asistente')->first();
		//var_dump($role_asistente->id);

		$user_asistentes = User::where('role_id', '=', $role_asistente->id)->get();
		$asistentes = array();
		foreach($user_asistentes as $key => $asistente){
			$asistentes[$asistente->id] = $asistente->apellidos .', '.$asistente->nombre;
		}


		return View::make('telefonicas.create')
			->with('clientes', $clientes)
			->with('asistentes', $asistentes);

		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Telefonica::$rules);

		if($validator->fails()){

			return Redirect::to('telefonicas/create')
				->withErrors($validator)
				->withInput();			

		}else{

			
			$telefonica = new Telefonica;
			$telefonica->user_id = Input::get('user_id');
			$telefonica->asistente_id = Input::get('asistente_id');
			/*
			if(Auth::check()){
				$telefonica->asistente_id = Auth::user()->id;
			}
			*/

			$telefonica->lugar = Input::get('lugar');
			$telefonica->informacion = Input::get('informacion');
			$telefonica->anexos = Input::get('anexos');
			$telefonica->observaciones = Input::get('observaciones');
			$telefonica->firma = Input::get('firma');
			$telefonica->fecha = Input::get('fecha');

			if($telefonica->save()){

				return Redirect::to('telefonicas')
					->with('global', 'Consulta Telefónica guardada con éxito.');
			}
			
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$telefonica = Telefonica::find($id);

		return View::make('telefonicas.show')
			->with('telefonica', $telefonica);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//la consulta esta llamada ya
		$telefonica = Telefonica::find($id);

		//buscamos el id de role cliente
		$role_cliente = Role::where('nombre','=', 'Cliente')->first();
		//var_dump($role_cliente->id);

		$user_clientes = User::where('role_id', '=', $role_cliente->id)->get();
		$clientes = array();
		foreach($user_clientes as $key => $cliente){
			$clientes[$cliente->id] = $cliente->apellidos .', '.$cliente->nombre;
		}

		//y lo mismo hacemos para los asistentes
		$role_asistente = Role::where('nombre','=', 'Asistente')->first();
		//var_dump($role_asistente->id);

		$user_asistentes = User::where('role_id', '=', $role_asistente->id)->get();
		$asistentes = array();
		foreach($user_asistentes as $key => $asistente){
			$asistentes[$asistente->id] = $asistente->apellidos .', '.$asistente->nombre;
		}


		return View::make('telefonicas.edit')
			->with('telefonica', $telefonica)
			->with('clientes', $clientes)
			->with('asistentes', $asistentes);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = [
			'user_id' => 'required',
			'informacion' => 'required'
		];
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

			return Redirect::to('telefonicas/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$telefonica = Telefonica::find($id);
			$telefonica->user_id = Input::get('user_id');
			$telefonica->asistente_id = Input::get('asistente_id');
			
			$telefonica->lugar = Input::get('lugar');
			$telefonica->informacion = Input::get('informacion');
			$telefonica->anexos = Input::get('anexos');
			$telefonica->observaciones = Input::get('observaciones');
			$telefonica->firma = Input::get('firma');
			$telefonica->fecha = Input::get('fecha');

			if($telefonica->save()){

				return Redirect::to('telefonicas')
					->with('global', 'Consulta Telefónica editada con éxito.');
			}else{

				return Redirect::to('telefonicas')
					->with('global', 'No se pudo editar la consulta telefónica, inténtelo más tarde');
			}
		}

	}


	


	public function destroy($id)
	{
		//
		$telefonica = Telefonica::find($id);
		$telefonica->eliminado = 1;
		$fecha = new dateTime('now');
		$telefonica->deleted_at = $fecha;
		$telefonica->save();

		return Redirect::to('telefonicas')
			->with('message', 'Consulta Telefónica Eliminada.');
	}


}
