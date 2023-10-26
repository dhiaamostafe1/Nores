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
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->integer('Int_NO');
            $table->integer('Brnch_NO');
            $table->integer('Stor_id');
            $table->integer('box_id');
            $table->integer('Tak_NO');
            $table->integer('ENd_kind');
            $table->dateTime('ENd_Date');
            $table->string('ENd_Date_A');
            $table->string('ENd_Note');
            $table->boolean('Dele');
            $table->boolean('Trns');
            $table->string('PCName');
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
        Schema::dropIfExists('entries');
    }
};
