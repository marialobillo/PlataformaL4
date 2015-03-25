<?php 


class Telefonica extends Eloquent{


	protected $table = 'telefonicas';

	public static $rules = [
		'user_id' => 'required',
		'informacion' => 'required'

	];

	protected $guarded = array('*');

	protected $fillable = ['user_id', 'asistente_id', 'lugar',
	 'informacion', 'observaciones', 'eliminado', 'anexos', 'firma'];

	protected $softDelete = true;

}

 ?>