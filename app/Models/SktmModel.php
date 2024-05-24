<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SktmModel extends Model
{
    use HasFactory;

    protected $table = 'sktm';
    protected $primaryKey = 'sktm_id';
    protected $guarded = ['sktm_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }
    public function getrt()
    {
        return $this->belongsTo(User::class, 'rt', 'rt_id');
    }
}
