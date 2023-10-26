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
        Schema::create('setting__users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('User_NO');
            $table->string('User_Name');

            $table->boolean('Show_brnch_saf');
            $table->boolean('Show_SHRT_BTN');

            $table->integer('stor_id');
            $table->integer('SAFE_NO');
            $table->integer('BANK_NO');

            $table->decimal('Disc_P' ,$precision = 18, $scale = 2);
            $table->decimal('Disc_N' ,$precision = 18, $scale = 2);

            $table->string('Pass');
            $table->integer('MNOB_NO');
            $table->integer('CUS_NO');

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
        Schema::dropIfExists('setting__users');
    }
};
