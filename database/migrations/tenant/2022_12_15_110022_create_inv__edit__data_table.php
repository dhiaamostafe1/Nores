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
        Schema::create('inv__edit__data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Inv_No');
            $table->dateTime('Inv_Date');
            $table->string('Inv_Kind');
            $table->string('user');

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
        Schema::dropIfExists('inv__edit__data');
    }
};
