<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('vdo');
            $table->string('cover_image');
            $table->string('storyline');
            $table->string('budget');
            $table->string('opening');
            $table->string('gross');
            $table->string('cumulative');
            $table->unsignedInteger('runtime');
            $table->boolean('color');
            $table->string('aspect_ratio');
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
