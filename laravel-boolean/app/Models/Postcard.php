<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postcard extends Model
{
    protected $fillable = [
        'sender',
        'address',
        'text',
        'image'
    ];
}
