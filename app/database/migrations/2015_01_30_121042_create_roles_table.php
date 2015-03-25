<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		Schema::create('roles', function($table){

			$table->increments('id');
			$table->string('nombre', 80);
			$table->string('descripcion');
			$table->float('importe', 10, 2);
			$table->float('impuesto', 10, 2);
			$table->float('total', 10, 2);
			$table->boolean('eliminado')->default(0);
			$table->softDeletes();
			$table->timestamps();

		});
		*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('roles');
	}

}
