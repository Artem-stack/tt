<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('movies', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')
          ->references('id')->on('genres')
          ->onDelete('cascade');
            $table->integer('status')->default('0');
            $table->string('image')->default('20230319225856.jpg');
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
         Schema::dropIfExists('movies');
    }
}
