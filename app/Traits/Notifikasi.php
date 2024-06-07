<?php

namespace App\Traits;

use App\Models\PengumumanModel;

trait Notifikasi
{
    private function getNotifikasiPengumuman()
    {
        return PengumumanModel::orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }
}
