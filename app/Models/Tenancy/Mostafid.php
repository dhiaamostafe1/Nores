<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mostafid extends Model
{
    use HasFactory;
    protected $table = 'mostafids';
    protected $fillable = [
        
        'Name',
        'Mobile',
        'Email',
        'Address',
        'Max_credit',
        'Vat_No',
        'Activ',
        'ACC_NO',
        'Kindly',
        'acountAny',
 
       
    ];

public function AccountTree()
{
return $this->belongsTo(Account_Tree::class,'acountAny' ,'id');
}


}
