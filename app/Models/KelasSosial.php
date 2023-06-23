<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSosial extends Model
{
    use HasFactory;
    
    protected $table = 'kelas_sosial_detail';
    protected $guarded = ['id'];
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    public $timestamps = false;
}