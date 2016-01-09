<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha_sol');
            $table->enum('estado',['guardada','pendiente','aceptada','rechazada','en_curso','finalizada','validada']);
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->integer('id_vinculacion');
            $table->string('motivo',150);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solicitudes');
	}

}
