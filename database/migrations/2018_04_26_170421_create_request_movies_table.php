<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('storyline');
            $table->string('budget');
            $table->string('opening');
            $table->string('gross');
            $table->string('cumulative');
            $table->boolean('color');
            $table->string('aspect_ratio');
            $table->unsignedInteger('requester');
            $table->boolean('is_accept');
            $table->timestamps();

            $table->foreign('requester')
            ->references('id')
            ->on('user')
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
        Schema::dropIfExists('request_movies');
    }
}
