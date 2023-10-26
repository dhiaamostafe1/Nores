<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'Item_cod',
        'Item_Name',
        'Item_Name_E',
        'Item_Group',
        'Item_Kind',
        'Item_ORD',
        'Item_VAT',
        'item_activ',
        'Brnch_No',
        'Trns',
       
       
    ];



    public function RELItems(){
        return $this->hasMany(Item_Sub::class,'idItems' ,'id');
    }


    
}
