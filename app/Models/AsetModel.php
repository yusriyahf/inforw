<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AsetModel extends Model
{
    use HasFactory;

    protected $table = 'aset';


    protected $primaryKey = 'aset_id';

    protected $guarded = ['aset_id'];

    public function getrw()
    {
        return $this->belongsTo(RwModel::class, 'rw', 'rw_id');
    }
    public function getrt()
    {
        return $this->belongsTo(RtModel::class, 'rt', 'rt_id');
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/gambar/aset/' . $image),
        );
    }
}
