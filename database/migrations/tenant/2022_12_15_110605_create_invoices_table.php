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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('brnch_NO');
            $table->integer('stor_id');
            $table->integer('Saf_id');
            $table->integer('repr_no');
            $table->string('Cus_NO');
            $table->integer('Tak_Id');
            $table->integer('inv_NO');
            $table->string('Doc_No');
            $table->string('user_Name');
            $table->dateTime('datee');
            $table->string('datea');
            $table->decimal('Total' ,$precision = 18, $scale = 2);
            $table->decimal('Cost' ,$precision = 18, $scale = 2);
            $table->decimal('Disc' ,$precision = 18, $scale = 2);
            $table->decimal('Vat' ,$precision = 18, $scale = 2);
            $table->decimal('Cop' ,$precision = 18, $scale = 2);
            $table->decimal('Offer' ,$precision = 18, $scale = 2);
            $table->decimal('cash' ,$precision = 18, $scale = 2);
            $table->decimal('Net' ,$precision = 18, $scale = 2);
            $table->integer('Entry');
            $table->string('INv_kind');
            $table->string('Notee');
            $table->boolean('dele');
            $table->integer('num');
            $table->string('QR_COd_image');
            $table->integer('Trns');
            $table->string('Pcname' ,500);
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
        Schema::dropIfExists('invoices');
    }
};
