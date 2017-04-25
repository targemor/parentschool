<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('votos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('voto');
            $table->integer('idTutor')->unsigned();
            $table->integer('idEvento')->unsigned();
            $table->foreign('idTutor')->references('id')->on('users');
            $table->foreign('idEvento')->references('id')->on('eventos');
            
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
        Schema::dropIfExists('votos');
    }
}
