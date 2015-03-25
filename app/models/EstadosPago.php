<?php 


class EstadosPago extends Eloquent{


	protected $table = 'estadospagos';

	protected $guarded = array('*');


	public static $rules = [
		'nombre' => 'required'
	];

	protected $softDelete = true;
	
}

 ?>