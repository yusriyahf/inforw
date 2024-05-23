<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RolesModel extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    protected $guarded = ['role_id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }
}
