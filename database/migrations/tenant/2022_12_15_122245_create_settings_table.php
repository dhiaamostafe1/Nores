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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Pc_name');
            $table->string('ipp');
            $table->boolean('login_kind');
            $table->boolean('tr_inv');
            $table->boolean('Catories');
            $table->boolean('purch_add');
            $table->boolean('boy_prcnt');
            $table->string('prnt_sml');
            $table->string('prnt_A4');
            $table->string('prnt_brcd');
            $table->integer('prnt_cnt');




            $table->decimal('inv_vat' ,$precision = 18, $scale = 2);
            $table->decimal('purch_vat' ,$precision = 18, $scale = 2);
            $table->decimal('vat_in' ,$precision = 18, $scale = 2);
            $table->string('vat_num');
            $table->boolean('inv_prnt_kind');
            $table->boolean('prch_prnt_kind');
            $table->boolean('rpt_prnt_kind');
            $table->boolean('gotocnt');
            $table->boolean('showunt');
            $table->boolean('showmsgprnt');
            $table->boolean('showoffer');
            $table->boolean('sumitm');
            $table->boolean('inv_crdt');
            $table->boolean('inv_rtrn');
            $table->boolean('inv_rtrn_D');
            $table->boolean('inv_tch');
            $table->boolean('VAT_kND');
            $table->boolean('INV_AD');
            $table->string('Color');
            $table->boolean('btn_scrn');
            $table->integer('GRP_CNT');
            $table->integer('ITM_CNT');
            $table->string('GLD_M');

            
            $table->decimal('GLD_KSR' ,$precision = 18, $scale = 2);
            $table->decimal('GLD_PRC' ,$precision = 18, $scale = 2);
            $table->string('GLD_WEB');
            $table->integer('MIZSTR');
            $table->integer('MIZTQ');
            $table->boolean('TBlE');





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
        Schema::dropIfExists('settings');
    }
};
