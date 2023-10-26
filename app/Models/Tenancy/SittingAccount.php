<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SittingAccount extends Model
{
    use HasFactory;
    protected $table = 'sitting_accounts';
    protected $fillable = [
        
        'client',
        'supplier',
        'box',
        'bank',
        'brnch',
        'store',
        'employ',
        'expenses',
        'tax',
        'costsales',
        'salesprofits',
        'envoy',
        'Userid',


       
    ];

    
}
