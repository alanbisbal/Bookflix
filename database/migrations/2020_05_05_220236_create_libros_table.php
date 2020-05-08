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
            $table->increments('id');
            $table->string('isbn')->unique();
            $table->string('desc');
            $table->string('titulo');
            $table->string('img_libro');
            $table->string('titulo_trailer');
            $table->string('desc_trailer');
            $table->string('img_trailer');
            $table->string('editorial');
            $table->integer('idautor');      
            $table->string('genero');
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
