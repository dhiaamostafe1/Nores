<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Sub extends Model
{
    use HasFactory;
    protected $table = 'item__subs';
    protected $primaryKey = 'id';
    protected $fillable = [
        
        'Item_cod',
        'Item_Unit',
        'Item_CNT',
        'Item_Sell',
        'Item_BAY',
        'Item_BAY1',
        'Item_NAT',
        'Calories',
        'Prcnt',
        'Offer',
        'Item_Activ',
        'Brnch_NO',
        'Trns',
        'idItems',
        
       
    ];


public function itesmmodel()
{
return $this->belongsTo(Item::class);
}

}
