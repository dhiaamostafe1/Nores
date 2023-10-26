<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_Tree extends Model
{
    use HasFactory;
    protected $table = 'account__trees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'DebitAccount',
        'CreditAccount',
        'BalanceAccount',
        'AccountID',
        'AccountName',
        'Type',
        'AccountSource',
        'WiewInFavorites',
        'ACC_MAIN',
    ];


    public function childs(){
        return $this->hasMany(Account_Tree::class,'AccountSource');
    }


    public function ChildsMostafe(){
        return $this->hasOne(Mostafid::class,'acountAny' ,'id');
    }

}
