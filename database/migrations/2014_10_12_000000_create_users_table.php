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
            $table->string('fullname' , 50);
            $table->string('phone' , 10);
            $table->string('password');
            $table->string('avatar');
            $table->string('lastLogin');
            $table->string('email');
            $table->string('access');
            $table->UnsignedInteger('expertise_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
