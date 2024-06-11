<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';

    protected $guarded = ['peminjaman_id'];

    public function getAset(){
       return $this->belongsTo(AsetModel::class, 'aset', 'aset_id');
    }
    public function getPeminjam(){
       return $this->belongsTo(User::class, 'peminjam', 'user_id');
    }
    public function getRT(){
       return $this->belongsTo(RtModel::class, 'rt', 'rt_id');
    }
}
