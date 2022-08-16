<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traktor extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function anggota()
    {
      return $this->belongsTo(anggota::class, 'id_anggota');
    }
}
