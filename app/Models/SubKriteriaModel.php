<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $primaryKey = 'sub_kriteria_id';

    protected $guarded = ['sub_kriteria_id'];

    public function getKriteria(){
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }
}
