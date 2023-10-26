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
        Schema::create('sitting_domains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active');
            $table->string('payment');
            $table->string('datatime');
            $table->string('entitytype');
            $table->string('category');
            // $table->boolean('time');
            $table->foreignId('domainid')->references('id')->on('domains')->onDelete('cascade');
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
        Schema::dropIfExists('sitting_domains');
    }
};
