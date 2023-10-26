<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    protected $table = 'settings';
    protected $fillable = [
        
        'Pc_name',
        'ipp',
        'login_kind',
        'tr_inv',
        'Catories',
        'purch_add',
        'boy_prcnt',
      
        'prnt_sml',
        'prnt_A4',
        'prnt_brcd',

        'prnt_cnt',
        'inv_vat',
        'purch_vat',
        'vat_in',
        'vat_num',
        'inv_prnt_kind',
        'prch_prnt_kind',
        'rpt_prnt_kind', 
        'gotocnt',

        
        'showunt',
        'showmsgprnt',
        'showoffer',
        'sumitm',
        'inv_crdt',

        'inv_rtrn',
        'inv_rtrn_D',
        'inv_tch',
        'VAT_kND',
        'INV_AD',
        'Color',
        'btn_scrn',
        'GRP_CNT',
        'ITM_CNT',
        'GLD_M',


        'GLD_KSR',
        'GLD_PRC',
        'GLD_WEB',
        'MIZSTR',
        'MIZTQ',
        'TBlE',
      
    
       
    ];

    
}
