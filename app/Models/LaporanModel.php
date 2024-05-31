<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    use HasFactory;

    protected $table = 'laporan_keuangan';
    protected $primaryKey = 'laporan_keuangan_id';
    protected $guarded = ['laporan_keuangan_id'];

    public function getpemasukan()
    {
        return $this->belongsTo(PemasukanModel::class, 'pemasukan', 'pemasukan_id');
    }

    public function getpengeluaran()
    {
        return $this->belongsTo(PengeluaranModel::class, 'pengeluaran', 'pengeluaran_id');
    }
}
