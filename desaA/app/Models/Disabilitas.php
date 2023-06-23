<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disabilitas extends Model
{
    use HasFactory;

    public function penduduk(){
        return $this->hasMany(Penduduk::class);
    }
    protected $table = 'disabilitas';
    protected $guarded = ['id'];
}