<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'kegiatan_id';
    protected $guarded = ['kegiatan_id'];


    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }

    public function getrt()
    {
        return $this->belongsTo(User::class, 'rt', 'rt_id');
    }
    public function role(): BelongsTo
    {
        return $this->belongsTo(RolesModel::class, 'role_id', 'role_id');
    }
}
