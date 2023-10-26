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
        Schema::create('user__rulls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('User_no');
            $table->string('User_Name');
            $table->integer('Scrn_no');
            $table->integer('Roll');
            $table->string('Scrn_Name',500);
            $table->string('Scrn_Name_E',500);
            $table->boolean('Inter');
            $table->boolean('ADD');
            $table->boolean('Update');
            $table->boolean('Delete');
            $table->boolean('Show');
            $table->boolean('Print');

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
        Schema::dropIfExists('user__rulls');
    }
};
