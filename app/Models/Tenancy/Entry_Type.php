<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry_Type extends Model
{
    use HasFactory;
    protected $table = 'entry__types';
    protected $fillable = [
        
        'Entry_Type',
    ];
}
