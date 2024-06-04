<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaModel extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';
    protected $primaryKey = 'penerima_id';

    protected $guarded = ['penerima_id'];
}
