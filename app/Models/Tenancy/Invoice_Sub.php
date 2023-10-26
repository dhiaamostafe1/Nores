<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_Sub extends Model
{
    use HasFactory;
    protected $table = 'invoice__subs';
    protected $fillable = [
        
        'Inv_NO',
        'Item_no',
        'Item_Name',
        'Unite',
        'Qty',
        'Sell',
        'Bay',
        'Disc',
        'ToT',
        'Vat',
        'Nat_Cod',
        'Exp_date',
        'Stor',
        'Offer',
        'Num',

        'Inv_kind',
        'Note',
        'Entry',
        'trns',
       
    ];
}
