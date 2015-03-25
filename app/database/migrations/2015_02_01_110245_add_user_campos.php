<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserCampos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table){

			$table->integer('nclientes')->unsigned();
			$table->integer('aci_id')->unsigned();
			$table->integer('tiposuser_id')->unsigned();
			$table->boolean('eliminado')->default(0);
			$table->softDeletes();
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
