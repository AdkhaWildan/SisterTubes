<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disabilitas;
use App\Http\Resources\DisabilitasResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DisabilitasController extends Controller
{
     public function index(){
        $disabilitas = DB::table('penduduk')
            ->leftJoin('dusun', 'penduduk.dusun_id', '=', 'dusun.id')
            ->leftjoin('disabilitas', 'penduduk.disabilitas_id', '=', 'disabilitas.id')
            ->select('dusun.desa_id as DesaID', 'dusun.id as DusunID', 'dusun.nama as Nama_Dusun', 'disabilitas.id as ID_Disabilitas', 'disabilitas.nama as Disabilitas', DB::raw('COUNT(*) as Total'))
            ->groupBy('dusun.nama', 'disabilitas.nama')
            ->get();
        
            return new DisabilitasResource(true, 'List Penyandang Disabilitas', $disabilitas);
    }
}