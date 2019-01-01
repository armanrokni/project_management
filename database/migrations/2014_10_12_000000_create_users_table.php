<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->char('fullname' , 255);
          $table->char('phone' , 20);
          $table->string('password');
          $table->string('email');
          $table->string('access')->nullable();
          $table->unsignedInteger('expertise_id');
          $table->string('avatar');
          $table->string('lastLogin')->nullable();
          $table->rememberToken();
          $table->timestamps();
          $table->foreign('expertise_id')->references('id')->on('expertises')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
