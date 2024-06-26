<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';

    protected $guarded = ['kriteria_id'];

    public function sub_kriteria()
    {
        return $this->hasMany(SubKriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }
}
