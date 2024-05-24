<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RwModel extends Model
{
    use HasFactory;

    protected $table = 'rw';
    protected $primaryKey = 'rw_id';
    protected $guarded = ['rw_id'];

    public function getketuarw()
    {
        return $this->belongsTo(User::class, 'ketua', 'user_id');
    }

    public function getsekretarisrw()
    {
        return $this->belongsTo(User::class, 'sekretaris', 'user_id');
    }
    public function getbendahararw()
    {
        return $this->belongsTo(User::class, 'bendahara', 'user_id');
    }
}
