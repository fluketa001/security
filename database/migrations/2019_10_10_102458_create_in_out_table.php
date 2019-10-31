<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_out', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('car_in');
            $table->dateTime('car_out');
            $table->string('description');
            $table->string('license_plate');
            $table->string('status');
            $table->string('car_type');
            $table->integer('enterprise_id');
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
        Schema::dropIfExists('in_out');
    }
}
