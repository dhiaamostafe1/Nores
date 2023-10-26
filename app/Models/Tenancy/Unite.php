<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    
    protected $table = 'unites';
    protected $fillable = [
        
        'unite_name',
       
    ];


    
}
