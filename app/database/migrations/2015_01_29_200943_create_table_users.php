<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		Schema::create('tarifas', function($table){

			$table->increments('id');
			$table->string('nombre', 80);
			$table->string('descripcion', 200);
			$table->float('importe', 10, 2);
			$table->float('impuesto', 10, 2)->default(7.00);
			$table->float('total', 10, 2);
			$table->boolean('eliminado');
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
		//$table->drop('tarifas');
	}

}
