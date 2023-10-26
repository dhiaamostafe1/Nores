<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
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
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('Item_cod');
            $table->string('Item_Name');
            $table->string('Item_Name_E');
            $table->string('Item_Group');
            $table->string('Item_Kind');
            $table->decimal('Item_ORD' ,$precision = 18, $scale = 2);
            $table->decimal('Item_VAT' ,$precision = 18, $scale = 2);
            $table->boolean('item_activ');
            $table->integer('Brnch_No');
            $table->integer('Trns');


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
        Schema::dropIfExists('items');
    }
};
