<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Com_Detailes extends Model
{
    use HasFactory;
    protected $table = 'com__detailes';
    protected $fillable = [
        
        'Company_name',
        'Country',
        'City',
        'TelePhone',
        'Mobile',
        'Address1',
        'Address2',
        'Address3',
        'Currency',
        'Footer',
        'Logo',
        'IdUser',
       
    ];


    
}
