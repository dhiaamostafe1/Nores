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
        Schema::create('com__detailes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Company_name');
            $table->string("Country");
            $table->string("City");
            $table->string("TelePhone");
            $table->string("Mobile");
            $table->string("Address1");
            $table->string("Address2");
            $table->string("Address3");
            $table->string("Currency");
            $table->string("Footer");
            $table->string("Logo");
            $table->integer("IdUser");
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
        Schema::dropIfExists('com__detailes');
    }
};
