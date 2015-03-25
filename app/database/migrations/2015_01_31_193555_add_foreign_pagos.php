<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignPagos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('pagos', function($table){

			
			$table->integer('empleado_id')->unsigned();
			$table->integer('auth_id')->unsigned();
			
			$table->integer('estadospago_id')->unsigned();
			$table->integer('nomina_id')->unsigned();
			
			$table->foreign('empleado_id')->references('id')->on('users');
			$table->foreign('auth_id')->references('id')->on('users');
			$table->foreign('estadospago_id')->references('id')->on('estadospagos');
			$table->foreign('nomina_id')->references('id')->on('nominas');
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
