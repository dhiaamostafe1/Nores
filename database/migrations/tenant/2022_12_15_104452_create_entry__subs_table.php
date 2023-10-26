<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry__subs', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->integer('ENd_NO');
            $table->integer('ACC_NO');
            $table->string('ACC_Name');
            $table->string('Catch',50);
            $table->decimal('Madin' ,$precision = 18, $scale = 2);
            $table->decimal('Dain' ,$precision = 18, $scale = 2);
            $table->string('End_NOT',900);
            $table->integer('COS_Cent_NO');
            $table->string('COS_Cent_NAMe');
            $table->integer('NOO');
            $table->dateTime('Expir');
            $table->string('End_Kind');
            $table->integer('Trns');
            $table->foreignId('idEntry')->references('id')->on('entries')->onDelete('cascade');

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
        Schema::dropIfExists('entry__subs');
    }
};
