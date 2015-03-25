<?php 

class Role extends Eloquent{

	protected $table = 'roles';

	protected $guarded = array('*');

	protected $fillable = ['nombre', 'descripcion', 'eliminado'];

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