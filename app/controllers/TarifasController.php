<?php

class TarifasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$tarifas = Tarifa::where('eliminado', '=', 0)->get();

		return View::make('tarifas.index')
			->with('tarifas', $tarifas);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('tarifas.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Tarifa::$rules);

		if($validator->fails()){

			return Redirect::to('tarifas/create')
			->withErrors($validator)
			->withInput();

		}else{

			$tarifa = new Tarifa();
			$tarifa->nombre = Input::get('nombre');
			$tarifa->descripcion = Input::get('descripcion');
			$tarifa->importe = Input::get('importe');
			$tarifa->impuesto = Input::get('impuesto');
			if(Input::get('total') == ''){
				$total = Input::get('importe')+(Input::get('importe') * 
					Input::get('impuesto') / 100);
				$tarifa->total = $total;
			}

			$tarifa->save();

			return Redirect::to('tarifas')
				->with('message', 'Tarifa creada con éxito, gracias.');

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
		$tarifa = Tarifa::find($id);
		return View::make('tarifas.show')
			->with('tarifa', $tarifa);
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
		$tarifa = Tarifa::find($id);

		return View::make('tarifas.edit')
			->with('tarifa', $tarifa);
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
		$validator = Validator::make(Input::all(), Tarifa::$rules);

		if($validator->fails()){

			return Redirect::to('tarifas/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$tarifa = Tarifa::find($id);
			$tarifa->nombre = Input::get('nombre');
			$tarifa->descripcion = Input::get('descripcion');
			$tarifa->importe = Input::get('importe');
			$tarifa->impuesto = Input::get('impuesto');
			//calculamos el valor total de la tarifa
			$total = Input::get('importe')+(Input::get('importe') * 
					Input::get('impuesto') / 100);
			$tarifa->total = $total;
			
			$tarifa->save();
		
			return Redirect::to('tarifas')
				->with('message', 'Tarifa editada con éxito, gracias.');

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
		$tarifa = Tarifa::find($id);
		$tarifa->delete();

		return Redirect::to('tarifas')
			->with('message', 'Acaba de eliminar la Tarifa.');
	}


}
