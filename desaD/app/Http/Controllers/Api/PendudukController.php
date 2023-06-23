<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Http\Resources\PendudukResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PendudukController extends Controller
{
    public function index(){
        $Penduduk = DB::table('penduduk')
            ->join('dusun', 'penduduk.dusun_id', '=', 'dusun.id')
            ->select('dusun.desa_id as DesaID', 'dusun.id as DusunID', 'dusun.nama as Nama_Dusun', 
            DB::raw('COUNT(*) as Jumlah_Penduduk'))
            ->groupBy('dusun.nama' )
            ->get();
        
            return new PendudukResource(true, 'Data Populasi Dusun', $Penduduk);
    }
}