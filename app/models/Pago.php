<?php 


class Pago extends Eloquent{

	protected $table = 'pagos';

	protected $guarded = array('*');

	protected $fillable = ['empleado_id', 'auth_id', 
	'cedula', 'concepto', 'estadospago_id', 
	'fecha','eliminado', 'nomina_id'];


	public static $rules = [
		'empleado_id' => 'required', 
		'nomina_id' => 'required'
		
	];
}

 ?>