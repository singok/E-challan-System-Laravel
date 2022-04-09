<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trafficpolice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('dob');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('state');
            $table->string('postcode');
            $table->string('city');
            $table->string('user_id')->unique();
            $table->string('user_password');
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
        Schema::dropIfExists('trafficpolice');
    }
};
