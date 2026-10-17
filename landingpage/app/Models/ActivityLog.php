<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Request;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'module',
        'description',
        'ip_address',
    ];

    /**
     * Catat aktivitas admin secara statis dari controller mana pun.
     *
     * @param string $action      create | update | delete
     * @param string $module      Nama modul, mis. "Fasilitas"
     * @param string $description  Deskripsi singkat, mis. "Menambahkan: Ruang Kelas"
     */
    public static function record(string $action, string $module, string $description): void
    {
        self::create([
            'user_id'     => auth()->id(),
            'action'      => $action,
            'module'      => $module,
            'description' => $description,
            'ip_address'  => Request::ip(),
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
