<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'hero_title',
        'hero_description',
        'profile',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'whatsapp',
        'students_count',
        'graduates_count',
        'japan_count',
        'experience_years',
    ];
}