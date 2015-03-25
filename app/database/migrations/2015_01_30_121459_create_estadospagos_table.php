<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadospagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		Schema::create('estadospagos', function($table){

			$table->increments('id');
			$table->string('nombre');
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
		//Schema::drop('estadospagos');
	}

}
