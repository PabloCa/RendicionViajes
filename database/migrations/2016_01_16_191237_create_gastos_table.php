<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gastos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_viaje', 30);
			$table->string('nombre_gasto', 30);

			$table->foreign('nombre_viaje')
				->references('nombre_viaje')->on('viajes')
				->onUpdate('CASCADE')
				->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gastos');
	}

}
