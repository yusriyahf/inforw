<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarKriteria extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_kriteria';
    protected $primaryKey = 'pk_id';

    protected $guarded = ['pk_id'];

    public function getsubKriteria(){
        return $this->belongsTo(SubKriteriaModel::class, 'sub_kriteria_id', 'sub_kriteria_id');
    }
}
