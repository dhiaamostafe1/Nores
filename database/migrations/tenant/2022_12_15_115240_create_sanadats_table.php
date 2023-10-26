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
        Schema::create('sanadats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Sub_NO');
            $table->string('SAf_NO');
            $table->string('Sub_Name');
            $table->string('Doc_No');
            $table->dateTime('datee');
            $table->string('datea');
            $table->string('Mos_NO');
            $table->string('Doc_Name');
            $table->string('kindly');
            $table->decimal('Dain' ,$precision = 18, $scale = 2);
            $table->decimal('Madin' ,$precision = 18, $scale = 2);
            $table->string('Pay_kind');
            $table->integer('Ent_NO');
            $table->string('NOTEE');


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
        Schema::dropIfExists('sanadats');
    }
};
