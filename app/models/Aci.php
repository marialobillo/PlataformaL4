<?php 


class Aci extends Eloquent{

	protected $table = 'acis';

	protected $guarded = array('*');

	protected $fillable = ['nombre', 'descripcion', 'nclientes', 'naci', 'tipoaci', 'eliminado'];

	public static $rules = [
		'nombre' => 'required', 
		'nclientes' => 'required'
	];

	protected $softDelete = true;
}

 ?>