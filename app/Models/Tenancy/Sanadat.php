<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanadat extends Model
{
    use HasFactory;
    protected $table = 'sanadats';
    protected $fillable = [
        
        'Sub_NO',
        'SAf_NO',
        'Sub_Name',
        'Doc_No',
        'datee',
        'datea',
        'Mos_NO',
      
        'Doc_Name',
        'kindly',
        'Dain',
        'Madin',
        'Pay_kind',
        'Ent_NO',
        'NOTEE',
       
 
       
    ];



    
}
