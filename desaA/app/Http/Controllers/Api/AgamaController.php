<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Http\Resources\AgamaResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AgamaController extends Controller
{
    public function index(){
        $agama = DB::table('penduduk')
            ->leftJoin('dusun', 'penduduk.dusun_id', '=', 'dusun.id')
            ->leftJoin('agama', 'penduduk.agama_id', '=', 'agama.id')
            ->select('dusun.desa_id as DesaID', 'dusun.id as DusunID', 'dusun.nama as Nama_Dusun', 'agama.id as ID_Agama','agama.nama as Agama',      DB::raw('COUNT(*) as Total'))
            ->groupBy('dusun.nama' , 'agama.nama')
            ->get();
        
            return new AgamaResource(true, 'List Agama', $agama);
    }
}