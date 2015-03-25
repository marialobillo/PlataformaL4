<?php 


class Tarifa extends Eloquent{


	protected $table = 'tarifas';

	protected $guarded = array('*');

	protected $fillable = ['nombre', 'descripcion', 'importe', 'impuesto', 'total', 'eliminado'];

	public static $rules = [
		'nombre' => 'required', 
		'importe' => 'required'
	];

	protected $softDelete = true;
}

 ?>