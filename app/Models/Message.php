<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // campi che possono essere riempiti in massa (mass assignment)
    protected $fillable = [
        'author',
        'message',
    ];
}
