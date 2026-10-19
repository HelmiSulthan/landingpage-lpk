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
        'leader_photo',
        'leader_name',
        'leader_position',
        'address',
        'phone',
        'email',
        'whatsapp',
        'instagram',
        'tiktok',
        'students_count',
        'graduates_count',
        'japan_count',
        'experience_years',
        'graduates_gdrive_link',
    ];

    /**
     * Bersihkan &nbsp; dari konten Quill agar bisa word-wrap normal.
     */
    public static function cleanHtml(?string $html): string
    {
        return str_replace('&nbsp;', ' ', $html ?? '');
    }

    /**
     * Normalisasi nomor WhatsApp menjadi URL wa.me (hanya angka).
     */
    public function getWhatsappLinkAttribute(): string
    {
        $number = preg_replace('/[^0-9]/', '', $this->whatsapp ?? '');
        return "https://wa.me/{$number}";
    }
}
