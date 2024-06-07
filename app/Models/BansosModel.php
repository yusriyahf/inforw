<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BansosModel extends Model
{
    use HasFactory;

    protected $table = 'bansos';
    protected $primaryKey = 'bansos_id';

    protected $guarded = ['bansos_id'];

    public function kriteria()
    {
        return $this->hasMany(KriteriaModel::class, 'bansos_id', 'bansos_id');
    }
    public function getPendaftar()
    {
        return $this->hasMany(PendaftarBansosModel::class, 'bansos_id', 'bansos_id');
    }
}
