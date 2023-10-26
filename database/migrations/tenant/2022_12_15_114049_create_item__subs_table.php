<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;

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
        Schema::create('item__subs', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('Item_cod');
         //   $table->unsignedInteger('idItems');
          //  $table->unsignedInteger('idItems')->nullable();
            $table->string('Item_Unit');
            $table->decimal('Item_CNT' ,$precision = 18, $scale = 2);
            $table->decimal('Item_Sell' ,$precision = 18, $scale = 2);
            $table->decimal('Item_BAY' ,$precision = 18, $scale = 2);
            $table->decimal('Item_BAY1' ,$precision = 18, $scale = 2);
            $table->string('Item_NAT');
            $table->decimal('Calories' ,$precision = 18, $scale = 2);
            $table->decimal('Prcnt' ,$precision = 18, $scale = 2);
            $table->decimal('Offer' ,$precision = 18, $scale = 2);
            $table->boolean('Item_Activ');
            $table->integer('Brnch_NO');
            $table->boolean('Trns');
            $table->foreignId('idItems')->references('id')->on('items')->onDelete('cascade');
            //$table->foreign('idItems')->references('id')->on('items');
         
      
            //$table->foreign('idItems')->references('id')->on('items')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('item__subs');
    }
};
