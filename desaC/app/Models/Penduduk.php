<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
        use HasFactory;

    protected $guarded = ['id'];

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function disabilitas()
    {
        return $this->belongsTo(Disabilitas::class);
    }
    public function status_kawin()
    {
        return $this->belongsTo(StatusKawin::class);
    }
    public function kelas_sosial()
    {
        return $this->belongsTo(KelasSosial::class);
    }
    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}