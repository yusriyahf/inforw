<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaModel extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'keluarga_id';
    protected $guarded = ['keluarga_id'];


    public function getrw()
    {
        return $this->belongsTo(RwModel::class, 'rw', 'rw_id');
    }
    public function getrt()
    {
        return $this->belongsTo(RtModel::class, 'rt', 'rt_id');
    }

    public function getkepala()
    {
        return $this->belongsTo(User::class, 'kepala_keluarga', 'user_id');
    }
}
