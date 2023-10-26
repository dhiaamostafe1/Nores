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
        Schema::create('account__trees', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->decimal('DebitAccount', $precision = 18, $scale = 2);
            $table->decimal('CreditAccount' , $precision = 18, $scale = 2);
            $table->decimal('BalanceAccount' , $precision = 18, $scale = 2);
            $table->string('AccountID');
            $table->string('AccountName' ,500);
            $table->integer('Type');
           $table->integer('AccountSource');
            $table->boolean('WiewInFavorites');
            $table->boolean('ACC_MAIN');
           // $table->foreignId('AccountSource')->references('id')->on('account__trees');
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
        Schema::dropIfExists('account__trees');
    }
};
