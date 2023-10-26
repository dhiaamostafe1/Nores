<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Rull extends Model
{
    use HasFactory;
    protected $table = 'user__rulls';
    protected $fillable = [
        
        'User_NO',
        'User_Name',
        'Scrn_no',
        'Roll',
        'Scrn_Name',
        'Scrn_Name_E',
        'Inter',
        'ADD',
      
        'Update',
        'Delete',
        'Show',
        'Print',
       
    ];


    
}
