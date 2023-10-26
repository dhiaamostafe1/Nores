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
        Schema::create('invoice__subs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Inv_NO');
            $table->string('Item_no');
            $table->string('Item_Name');
            $table->string('Unite');
            $table->float('Qty');
            $table->decimal('Sell' ,$precision = 18, $scale = 2);
            $table->decimal('Bay' ,$precision = 18, $scale = 2);
            $table->decimal('Disc' ,$precision = 18, $scale = 2);
            $table->decimal('ToT' ,$precision = 18, $scale = 2);
            $table->decimal('Vat' ,$precision = 18, $scale = 2);
            $table->string('Nat_Cod');
            $table->dateTime('Exp_date');
            $table->integer('Stor');
            $table->decimal('Offer' ,$precision = 18, $scale = 2);
            $table->integer('Num');
            $table->string('Inv_kind');
            $table->string('Note');
            $table->integer('Entry');
            $table->integer('trns');
            $table->foreignId('idfatoorah')->references('id')->on('invoices')->onDelete('cascade');

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
        Schema::dropIfExists('invoice__subs');
    }
};
