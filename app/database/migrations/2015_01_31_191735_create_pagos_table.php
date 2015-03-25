<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('pagos', function($table){

			$table->increments('id');
			$table->string('cedula', 60);
			$table->string('concepto', 80);
			$table->datetime('fecha');
			$table->boolean('eliminado')->default(0);
			
			$table->softDeletes();
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
		Schema::drop('pagos');
	}

}
