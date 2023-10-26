<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketdomain extends Model
{
    use HasFactory;
    protected $table = 'ticketdomains';
    protected $fillable = [

        'name',
        'state',
        'sender',
        'message',
        'source',  
        'main', 
        'Userid',
    ];  
}
