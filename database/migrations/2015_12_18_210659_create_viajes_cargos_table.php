<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesCargosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('viajes_cargos', function(Blueprint $table)
		{
			$table->string('nombre_cargo', 30);
			$table->string('nombre_viaje', 30);

			$table->timestamps();


			$table->primary(array('nombre_cargo', 'nombre_viaje'));

			$table->foreign('nombre_cargo')
				->references('nombre_cargo')->on('cargos')
				->onUpdate('CASCADE')
				->onDelete('CASCADE');

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
		Schema::drop('viajes_cargos');
	}

}
