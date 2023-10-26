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
        Schema::create('mostafids', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('Name');
            $table->string('Mobile');
            $table->string('Email');
            $table->string('Address');
            $table->decimal('Max_credit' ,$precision = 18, $scale = 2);
            $table->string('Vat_No');
            $table->boolean('Activ');
            $table->string('ACC_NO');
            $table->integer('Kindly');
            $table->foreignId('acountAny')->references('id')->on('account__trees')->onDelete('cascade');

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
        Schema::dropIfExists('mostafids');
    }
};
