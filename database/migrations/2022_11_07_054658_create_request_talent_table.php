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
        Schema::create('request_talent', function (Blueprint $table) {
            $table->id();
            $table->string('jobfunction');
            $table->string('positiontype');
            $table->string('position_hiring_for');
            $table->string('email');
            $table->string('fname');
            $table->string('lname');
            $table->string('jobtitle');
            $table->string('number');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode');
            $table->string('company');
            $table->text('message');
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
        Schema::dropIfExists('request_talent');
    }
};
