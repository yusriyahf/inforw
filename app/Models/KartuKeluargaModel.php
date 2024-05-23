<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KartuKeluargaModel extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'kartu_keluarga_id';

    protected $guarded = ['kartu_keluarga_id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }

    public function rt(): BelongsTo
    {
        return $this->belongsTo(RtModel::class, 'rt_id', 'rt_id');
    }
}
