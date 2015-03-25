<?php

class AcisController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$acis = Aci::where('eliminado', '=', 0)->get();

		return View::make('acis.index')
			->with('acis', $acis);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('acis.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Aci::$rules);

		if($validator->fails()){

			return Redirect::to('acis/create')
			->withErrors($validator)
			->withInput();

		}else{

			$aci = new Aci();
			$aci->nombre = Input::get('nombre');
			$aci->descripcion = Input::get('descripcion');
			$aci->nclientes = Input::get('nclientes');
			$aci->naci = Input::get('naci');
			$aci->tipoaci = Input::get('tipoaci');


			$aci->save();

			return Redirect::to('acis')
				->with('message', 'Aci creado con éxito, gracias.');

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
		$aci = Aci::find($id);

		return View::make('acis.show')
			->with('aci', $aci);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$aci = Aci::find($id);

		return View::make('acis.edit')
			->with('aci', $aci);
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
		$validator = Validator::make(Input::all(), Aci::$rules);

		if($validator->fails()){

			return Redirect::to('acis/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$aci = Aci::find($id);
			$aci->nombre = Input::get('nombre');
			$aci->descripcion = Input::get('descripcion');
			$aci->nclientes = Input::get('nclientes');
			$aci->naci = Input::get('naci');
			$aci->tipoaci = Input::get('tipoaci');
			$aci->save();

		
			return Redirect::to('acis')
				->with('message', 'Aci editado con éxito.');

		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$aci = Aci::find($id);
		$aci->eliminado = 1;
		$fecha = new dateTime('now');
		$aci->deleted_at = $fecha;
		$aci->save();

		return Redirect::to('acis')
			->with('message', 'Aci Eliminado.');
	}


}
