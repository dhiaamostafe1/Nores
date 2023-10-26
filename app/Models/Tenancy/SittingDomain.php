<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SittingDomain extends Model
{
    use HasFactory;
    protected $table = 'sitting_domains';
    protected $fillable = [

        'active',
        'payment',
        'idDomain',
        'datatime',
        'entitytype',
        'category',
        
        
    ]; 

    
}
