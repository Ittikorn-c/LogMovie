<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_movies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('movie_id');
            $table->string('image');
            $table->timestamps();

            $table->foreign('movie_id')
            ->references('id')
            ->on('movies')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('image_movies');

    }
}
