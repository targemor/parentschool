<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('visto');
            $table->text('materias');
            $table->integer('idAlumno')->unsigned();

            $table->foreign('idAlumno')->references('id')->on('alumnos');
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
        Schema::dropIfExists('calificaciones');
    }
}
