<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesInListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_in_list', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("list_id");
            $table->timestamps();

            $table->foreign('list_id')
            ->references('id')
            ->on('list_movies')
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
        Schema::dropIfExists('movies_in_list');
    }
}
