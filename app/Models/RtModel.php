<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RtModel extends Model
{
    use HasFactory;

    protected $table = 'rt';
    protected $primaryKey = 'rt_id';
    protected $guarded = ['rt_id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }
}
