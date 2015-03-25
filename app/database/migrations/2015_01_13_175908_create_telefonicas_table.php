<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonicasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('telefonicas', function($table){

			$table->increments('id');
			$table->integer('user_id');
			$table->integer('asistente_id');
			$table->string('lugar');
			$table->text('informacion');
			$table->text('observaciones');
			$table->text('anexos');
			$table->string('firma');
			$table->datetime('fecha');
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
		Schema::drop('telefonicas');
	}

}
