<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use App\Http\Resources\DusunResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DusunController extends Controller
{
    public function index(){
        $dusun = Dusun::all();

        return new DusunResource(true, 'Data Dusun Desa A', $dusun);
    }
}