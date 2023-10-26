<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $table = 'costs';
    protected $fillable = [
        
        'TAK_NAME',
    ];



    
}
