<?php

class PagosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pagos = Pago::where('eliminado', '=', 0)->get();

		return View::make('pagos.index')
			->with('pagos', $pagos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		//buscamos el id de role cliente
		$tipo_empleado = TiposUser::where('nombre','=', 'Empleado')->first();
		

		$user_empleados = User::where('tiposuser_id', '=', $tipo_empleado->id)->get();
		$empleados = array();
		foreach($user_empleados as $key => $empleado){
			$empleados[$empleado->id] = $empleado->apellidos .', '.$empleado->nombre;
		}

		//buscamos los estados del pago
		$estados = array();
		$estadospagos = EstadosPago::all();

		foreach($estadospagos as $estado){
			$estados[$estado->id] = $estado->nombre;
		}

		//las nominas
		$nominas = array();
		$nominas_empleados = Nomina::where('eliminado', '=', 0)->get();
		foreach($nominas_empleados as $nomina){
			$nominas[$nomina->id] = $nomina->nombre.' ==>  $ '.$nomina->total;
		}

		return View::make('pagos.create')
			->with('empleados', $empleados)
			->with('estados', $estados)
			->with('nominas', $nominas);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Pago::$rules);

		if($validator->fails()){

			return Redirect::to('pagos/create')
				->withErrors($validator)
				->withInput();			

		}else{

			
			$pago = new Pago;
			$pago->empleado_id = Input::get('empleado_id');
			//busco la cedula
			$empleado = User::find(Input::get('empleado_id'));
			if($empleado != null){
				$pago->cedula = $empleado->cedula;
			}
			$pago->estadospago_id = Input::get('estadospago_id');
			
			$pago->nomina_id = Input::get('nomina_id');

			//Buscamos el importe en las nóminas
			$nomina = Nomina::find(Input::get('nomina_id'));
			if($nomina != null){
				$pago->importe = $nomina->total; 
			}
			
			$pago->concepto = Input::get('concepto');
			$pago->auth_id = Auth::user()->id;
			
			if($pago->save()){

				return Redirect::to('pagos')
					->with('global', 'El Pago ha sido guardado con éxito, gracias.');
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
		$pago = Pago::find($id);

		return View::make('pagos.show')
			->with('pago', $pago);
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
		$pago = Pago::find($id);

		//buscamos el id de empleado
		$tipo_empleado = TiposUser::where('nombre','=', 'Empleado')->first();
		
		$user_empleados = User::where('tiposuser_id', '=', $tipo_empleado->id)->get();
		$empleados = array();
		foreach($user_empleados as $key => $empleado){
			$empleados[$empleado->id] = $empleado->apellidos .', '.$empleado->nombre;
		}

		//estados del pago
		$estados = array();
		$estadospagos = EstadosPago::all();

		foreach($estadospagos as $estado){
			$estados[$estado->id] = $estado->nombre;
		}


		//nominas
		$nominas = array();
		$nominas_empleados = Nomina::where('eliminado', '=', 0)->get();
		foreach($nominas_empleados as $nomina){
			$nominas[$nomina->id] = $nomina->nombre.' ==>  $ '.$nomina->total;
		}

		return View::make('pagos.edit')
			->with('pago', $pago)
			->with('empleados', $empleados)
			->with('estados', $estados)
			->with('nominas', $nominas);


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
		$validator = Validator::make(Input::all(), Pago::$rules);

		if($validator->fails()){

			return Redirect::to('pagos/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$pago = Pago::find($id);
			$pago->empleado_id = Input::get('empleado_id');
			//busco la cedula
			$empleado = User::find(Input::get('empleado_id'));
			if($empleado != null){
				$pago->cedula = $empleado->cedula;
			}
			$pago->estadospago_id = Input::get('estadospago_id');
			
			$pago->nomina_id = Input::get('nomina_id');

			//Buscamos el importe en las nóminas
			$nomina = Nomina::find(Input::get('nomina_id'));
			if($nomina != null){
				$pago->importe = $nomina->total; 
			}
			
			$pago->concepto = Input::get('concepto');
			$pago->auth_id = Auth::user()->id;
			
			if($pago->save()){

				return Redirect::to('pagos')
					->with('global', 'Pago editado con éxito.');
			}else{

				return Redirect::to('pagos')
					->with('global', 'No se pudo editar el pago, inténtelo más tarde');
			}
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
		$pago = Pago::find($id);
		$pago->eliminado = 1;
		$fecha = new dateTime('now');
		$pago->deleted_at = $fecha;
		$pago->save();


		return Redirect::to('pagos')
			->with('message', 'El Pago ha sido eliminado.');
	}


}
