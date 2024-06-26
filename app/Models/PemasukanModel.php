<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanModel extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';
    protected $primaryKey = 'pemasukan_id';
    protected $guarded = ['pemasukan_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }

    public function getrt()
    {
        return $this->belongsTo(RtModel::class, 'rt', 'rt_id');
    }
}
