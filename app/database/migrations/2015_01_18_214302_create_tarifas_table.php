<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tarifas', function($table){

			$table->increments('id');
			$table->string('nombre');
			$table->string('descripcion');
			$table->float('importe', 10, 2);
			$table->float('impuesto', 8, 2);
			$table->float('total', 10, 2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
