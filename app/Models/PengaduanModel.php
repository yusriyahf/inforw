<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PengaduanModel extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'pengaduan_id';

    protected $guarded = ['pengaduan_id'];
    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }
    public function getrt()
    {
        return $this->belongsTo(RtModel::class, 'rt', 'rt_id');
    }
    public function getrw()
    {
        return $this->belongsTo(RwModel::class, 'rw', 'rw_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/gambar/' . $image),
        );
    }
}
