<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJustificacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('justificaciones', function(Blueprint $table)
		{
			$table->increments('id_justificacion');
			$table->string('justificacion', 100);
			$table->integer('id')->unsigned();
			$table->timestamps();

			$table->foreign('id')
				->references('id')->on('solicitudes')
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
		Schema::drop('justificaciones');
	}

}
