<?php

class NominasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$nominas = Nomina::where('eliminado', '=', 0)->get();

		return View::make('nominas.index')
			->with('nominas', $nominas);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('nominas.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Nomina::$rules);

		if($validator->fails()){

			return Redirect::to('nominas/create')
			->withErrors($validator)
			->withInput();

		}else{

			$nomina = new Nomina();
			$nomina->nombre = Input::get('nombre');
			$nomina->descripcion = Input::get('descripcion');
			$nomina->importe = Input::get('importe');
			$nomina->impuesto = 7;
			//calculamos el total
			$total = Input::get('importe')+(Input::get('importe') * 7 / 100);

			$nomina->total = $total;


			$nomina->save();

			return Redirect::to('nominas')
				->with('message', 'Nómina creada con éxito, gracias.');
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
		$nomina = Nomina::find($id);

		return View::make('nominas.show')
			->with('nomina', $nomina);
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
		$nomina = Nomina::find($id);

		return View::make('nominas.edit')
			->with('nomina', $nomina);
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
		$validator = Validator::make(Input::all(), Nomina::$rules);

		if($validator->fails()){

			return Redirect::to('nominas/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$nomina = Nomina::find($id);
			$nomina->nombre = Input::get('nombre');
			$nomina->descripcion = Input::get('descripcion');
			$nomina->importe = Input::get('importe');
			//$nomina->impuestos = 7;
			//calculamos el total
			$total = Input::get('importe')+(Input::get('importe') * 7 / 100);

			$nomina->total = $total;
			$nomina->save();

		
			return Redirect::to('nominas')
				->with('message', 'Nómina editado con éxito.');

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
		$nomina = Nomina::find($id);
		$nomina->eliminado = 1;
		$fecha = new dateTime('now');
		$nomina->deleted_at = $fecha;
		$nomina->save();

		return Redirect::to('nominas')
			->with('message', 'Nómina Eliminada.');
	}


}
