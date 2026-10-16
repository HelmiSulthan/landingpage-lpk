<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Support\Facades\Storage;

trait HandlesImageUpload
{
    /**
     * Hapus file gambar dari disk public jika path-nya ada.
     */
    protected function deleteImage(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Simpan file gambar ke folder yang ditentukan dan return path-nya.
     */
    protected function storeImage($file, string $folder): string
    {
        return $file->store($folder, 'public');
    }
}
