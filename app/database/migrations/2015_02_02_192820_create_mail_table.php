<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('mails', function($table){

			$table->increments('id');
			$table->integer('cliente_id')->unsigned();
			$table->integer('asistente_id')->unsigned();
			$table->string('lugar', 100);
			$table->text('informacion');
			$table->string('archivo1');
			$table->string('archivo2');
			$table->text('respuesta');
			$table->string('tema');
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
		Schema::drop('mails');
	}

}
