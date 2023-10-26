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
        Schema::create('sitting_accounts', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->integer('client');
            $table->integer('supplier');
            $table->integer('box');
            $table->integer('bank');
            $table->integer('brnch');
            $table->integer('store');
            $table->integer('employ');
            $table->integer('expenses');

            $table->integer('tax');
            $table->integer('costsales');
            $table->integer('salesprofits');
            $table->integer('envoy');
            $table->integer('Userid');
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
        Schema::dropIfExists('sitting_accounts');
    }
};
