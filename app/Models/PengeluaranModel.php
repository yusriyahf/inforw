<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengeluaranModel extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';
    protected $primaryKey = 'pengeluaran_id';

    protected $guarded = ['pengeluaran_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }

    public function getrt()
    {
        return $this->belongsTo(RtModel::class, 'rt', 'rt_id');
    }
    public function laporanKeuangan()
    {
        return $this->hasMany(LaporanModel::class, 'pemasukan');
    }
}
