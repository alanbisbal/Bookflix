<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('idperfil');
          $table->foreign('idperfil')->references('id')->on('perfils');
          $table->unsignedInteger('idLibro');
          $table->foreign('idLibro')->references('id')->on('libros');
          $table->integer('calif');
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
