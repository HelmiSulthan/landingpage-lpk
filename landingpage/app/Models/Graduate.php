<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    protected $fillable = [
        'name',
        'position',
        'location',
        'description',
        'photo',
    ];
}
