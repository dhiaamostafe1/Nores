<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_Edit_Data extends Model
{
    use HasFactory;
    protected $table = 'inv__edit__data';
    protected $fillable = [
        
        'Inv_No',
        'Inv_Date',
        'Inv_Kind',
        'user',
       
       
    ];
}
