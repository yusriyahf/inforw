<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarBansosModel extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_bansos';
    protected $primaryKey = 'pendaftar_id';
    protected $guarded = ['pendaftar_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function getKriteria(){
        return $this->hasMany(PendaftarKriteria::class, 'pendaftar_id', 'pendaftar_id');
    }
}
