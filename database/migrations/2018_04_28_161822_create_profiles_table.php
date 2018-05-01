<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->enum('gender', ['male', 'female', 'non-binary'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('location', 60)->nullable();
            $table->string('available_at', 80)->nullable();
            $table->text('about_me')->nullable();
            $table->string('avatar')->default('default.png');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('profiles');
    }
}
