<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSosial extends Model
{
    use HasFactory;

    public function penduduk(){
        return $this->hasMany(Penduduk::class);
    }
    protected $table = 'kelas_sosial';
    protected $guarded = ['id'];
}