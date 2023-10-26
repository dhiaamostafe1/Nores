<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = [
        
        'brnch_NO',
        'stor_id',
        'Saf_id',
        'repr_no',
        'Cus_NO',
        'Tak_Id',
        'inv_NO',
        'Doc_No',
        'user_Name',
        'datee',
        'datea',
        'Total',
        'Cost',
        'Disc',
        
        'Vat',
        'Cop',
        'Offer',
        'cash',
        'Net',
        'Entry',
        'INv_kind',
        'Notee',
        'dele',
        'num',
        'QR_COd_image',
        'Trns',
        'Pcname',
       
    ];



    public function child(){
        return $this->hasMany(Invoice_Sub::class,'idfatoorah' ,'id');
    }
}
