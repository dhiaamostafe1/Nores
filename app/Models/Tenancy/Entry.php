<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $table = 'entries';
    protected $fillable = [
        
        'Int_NO',
        'Brnch_NO',
        'Stor_id',
        'Tak_NO',
        'box_id',
        'ENd_kind',
        'ENd_Date',
        'ENd_Date_A',
        'ENd_Note',
        'Dele',
        'Trns',
        'PCName',
        
       
    ];


    public function Childs(){
        return $this->hasMany(Entry_Sub::class,'idEntry' ,'id');
    }
    
}
