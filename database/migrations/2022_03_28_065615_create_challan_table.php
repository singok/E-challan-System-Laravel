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
        Schema::create('challan', function (Blueprint $table) {
            $table->increments('id');

            // personal details
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('gender');
            $table->string('address');
            $table->string('province');
            $table->string('district');
            $table->string('email');
            $table->string('phone');
            $table->string('occupation');
            $table->string('health_condition');
            $table->string('disability');

            // vehicle details
            $table->string('model');
            $table->string('category');
            $table->string('engine_no');
            $table->string('color');
            $table->string('power');

            // form fill-up
            $table->string('driving_license');
            $table->string('passenger_no');
            $table->string('place');
            $table->string('time');
            $table->string('police_brit');
            $table->string('fine_reason');
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
        Schema::dropIfExists('challan');
    }
};
