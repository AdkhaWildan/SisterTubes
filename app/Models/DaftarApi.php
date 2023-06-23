<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarApi extends Model
{
    use HasFactory;
    protected $table = 'daftar_api';
    protected $guarded = ['id'];
}