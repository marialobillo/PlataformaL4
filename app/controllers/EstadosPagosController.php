<?php

class EstadosPagosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$estadospagos = EstadosPago::all();

		return View::make('estadospagos.index')
			->with('estadospagos', $estadospagos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('estadospagos.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), EstadosPago::$rules);

		if($validator->fails()){

			return Redirect::to('estadospagos/create')
			->withErrors($validator)
			->withInput();

		}else{

			$estadopago = new EstadosPago();
			$estadopago->nombre = Input::get('nombre');
			


			$estadopago->save();

			return Redirect::to('estadospagos')
				->with('message', 'Estado de Pago creado con éxito :)');

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
		$estadospago = EstadosPago::find($id);

		return View::make('estadospagos.edit')
			->with('estadospago', $estadospago);
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
		$validator = Validator::make(Input::all(), EstadosPago::$rules);

		if($validator->fails()){

			return Redirect::to('estadospagos/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$estadospago = EstadosPago::find($id);
			$estadospago->nombre = Input::get('nombre');
			$estadospago->save();

		
			return Redirect::to('estadospagos')
				->with('message', 'Estado de Pago editado con éxito :)');

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
		$estadospago = EstadosPago::find($id);
		//var_dump($estadospago);
		$estadospago->delete();

		return Redirect::to('estadospagos')
			->with('message', 'Estado de Pago Eliminado.');
	}


}
