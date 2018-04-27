<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('genres',[
                'Action',
                'Adventure',
                'Sci-Fi'
            ]);
            $table->text("explanation");
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
        Schema::dropIfExists('list_movies');
    }
}
