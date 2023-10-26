<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry_Sub extends Model
{
    use HasFactory;
    protected $table = 'entry__subs';
    protected $fillable = [
        
        'ENd_NO',
        'ACC_NO',
        'ACC_Name',
        'Catch',
        'Madin',
        'Dain',
        'End_NOT',
        'COS_Cent_NO',
        'COS_Cent_NAMe',
        'NOO',
        'Expir',
        'End_Kind',
        'Trns',
        'idEntry',
       
    ];
}
