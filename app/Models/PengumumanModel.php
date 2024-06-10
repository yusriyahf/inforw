<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PengumumanModel extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';
    protected $guarded = ['pengumuman_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }

    public function getrt()
    {
        return $this->belongsTo(User::class, 'rt', 'rt_id');
    }
    public function getrw()
    {
        return $this->belongsTo(User::class, 'rw', 'rw_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/gambar/pengumuman/' . $image),
        );
    }
}
