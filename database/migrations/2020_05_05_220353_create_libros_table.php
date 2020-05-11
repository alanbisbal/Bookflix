<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn')->unique();
            $table->string('desc');
            $table->string('titulo');
            $table->string('img_libro');
            $table->string('titulo_trailer');
            $table->string('desc_trailer');
            $table->string('img_trailer');


            $table->string('editorial');
            $table->foreign('editorial')->references('nombre')->on('editorials');

            $table->unsignedInteger('idautor');
            $table->foreign('idautor')->references('id')->on('autors');


            $table->string('genero');
            $table->foreign('genero')->references('nombre')->on('generos');

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
        Schema::dropIfExists('libros');
    }
}
