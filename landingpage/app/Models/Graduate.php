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

    /**
     * Tampilkan position jika ada, fallback ke location.
     */
    public function getDisplayPositionAttribute(): string
    {
        return $this->position ?? $this->location ?? '';
    }
}
