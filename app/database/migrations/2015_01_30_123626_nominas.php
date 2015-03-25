<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nominas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('nominas', function($table){

			$table->increments('id');
			$table->string('nombre', 80);
			$table->string('descripcion', 200);
			$table->float('importe', 10, 2);
			$table->float('impuesto', 10, 2)->default(7);
			$table->float('total', 10, 2);
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
		Schema::drop('nominas');
	}

}
