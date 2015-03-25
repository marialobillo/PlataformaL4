<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
		'email' => 'required|email|unique:users,email,{id}',
		'cedula' => 'required',
		'password' => 'required|min:6',
		'password_confirm' => 'required|same:password'
	];

	public static $rules_edit = [
		'nombre' => 'required',
		'apellidos' => 'required',
		'cedula' => 'required',	
	];

	protected $guarded = array('*');

	protected $fillable = [
		'email', 'password', 'password_temp', 'code', 'active','nombre', 'apellidos'
	];


	public function getAuthPassword(){

		return $this->password;
	}

	public function getReminderEmail(){

		return $this->email;
	}

}
