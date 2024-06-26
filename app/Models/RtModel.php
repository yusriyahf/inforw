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

    public function getketuart()
    {
        return $this->belongsTo(User::class, 'ketua', 'user_id');
    }

    public function getsekretarisrt()
    {
        return $this->belongsTo(User::class, 'sekretaris', 'user_id');
    }
    public function getbendaharart()
    {
        return $this->belongsTo(User::class, 'bendahara', 'user_id');
    }
}
