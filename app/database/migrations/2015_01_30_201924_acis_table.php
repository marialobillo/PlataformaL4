<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		/*Schema::create('acis', function($table){

			$table->increments('id')->primary();
			$table->string('nombre', 80);
			$table->string('descripcion', 200);
			$table->mediumInteger('nclientes')->unsigned();
			$table->smallInteger('naci')->unsigned();
			$table->string('tipoaci', 80);
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
		//Schema::drop('acis');
	}

}
