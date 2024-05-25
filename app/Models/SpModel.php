<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpModel extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'sp';
    protected $primaryKey = 'sp_id';
    protected $guarded = ['sp_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }
    public function getrt()
    {
        return $this->belongsTo(User::class, 'rt', 'rt_id');
    }
}
