<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraduateStat extends Model
{
    protected $fillable = [
        'label',
        'category',
        'total',
    ];
}
