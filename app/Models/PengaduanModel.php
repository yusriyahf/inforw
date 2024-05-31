<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanModel extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'pengaduan_id';

    protected $guarded = ['pengaduan_id'];
    public function users()
    {
        return $this->hasMany(User::class, 'user', 'user_id');
    }
    public function getrt()
    {
        return $this->hasMany(RtModel::class, 'rt', 'rt_id');
    }
    public function getrw()
    {
        return $this->hasMany(RwModel::class, 'rw', 'rw_id');
    }
}
