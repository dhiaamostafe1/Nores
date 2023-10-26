<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_User extends Model
{
    use HasFactory;
    protected $table = 'setting__users';
    protected $fillable = [
        
        'User_NO',

        'User_Name',
         'Show_brnch_saf',
         'Show_SHRT_BTN',
        'stor_id',
        'SAFE_NO',
        'BANK_NO',
      
        'Disc_P',
        'Disc_N',

         'Pass',
        'MNOB_NO',
        'CUS_NO',
    
    
       
    ];



    
}
