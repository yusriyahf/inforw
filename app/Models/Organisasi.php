<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';
    protected $primaryKey = 'organisasi_id';

    protected $guarded = ['id'];

    public function anggotaOrganisasi()
    {
        return $this->hasMany(AnggotaOrganisasi::class, 'organisasi_id');
    }
}
