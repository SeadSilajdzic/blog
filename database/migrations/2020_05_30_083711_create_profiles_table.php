<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('avatar')->default('uploads/avatars/default.png');
            $table->integer('user_id');
            $table->text('about')->default('Hello there!');
            $table->string('facebook')->default('https://www.facebook.com');
            $table->string('linkedin')->default('https://www.linkedin.com');
            $table->string('youtube')->default('https://www.youtube.com');
            $table->string('github')->default('https://www.github.com');
            $table->string('instagram')->default('https://www.instagram.com');
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
        Schema::dropIfExists('profiles');
    }
}
