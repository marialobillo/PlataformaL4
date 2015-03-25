<?php 

class TiposUser extends Eloquent{

	protected $table = 'tiposuser';

	protected $guarded = array('*');

	protected $fillable = ['nombre'];

	public static $rules = [
		'nombre' => 'required'
	];

	protected $softDelete = true;
	
	public function getNombreRole($id){

		$role = Role::find($id)->get();

		//var_dump($role);
	}
}

 ?>