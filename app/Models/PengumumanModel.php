<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(User::class, 'rt', 'user_id');
    }
}
