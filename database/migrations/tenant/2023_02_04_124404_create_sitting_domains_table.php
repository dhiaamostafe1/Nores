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
        Schema::create('sitting_domains', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->integer('idDomain');
            $table->string('payment');
            $table->string('datatime');
            $table->string('entitytype');
            $table->string('category');
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
