<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetModel extends Model
{
    use HasFactory;

    protected $table = 'aset';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

   
}