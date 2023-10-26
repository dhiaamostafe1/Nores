<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tables extends Model
{
    use HasFactory;
    protected $table = 'tables';
    protected $fillable = [
        
        'name',

    ];
}
