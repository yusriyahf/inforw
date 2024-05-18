<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'anggota_organisasi';
    protected $primaryKey = 'anggota_organisasi_id';

    protected $guarded = ['anggota_organisasi_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'organisasi_id');
    }
}
