<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KelasSosial;
use App\Http\Resources\KelasSosialResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class KelasSosialController extends Controller
{
    public function index(){
        $KelasSosial = DB::table('penduduk')
            ->leftJoin('dusun', 'penduduk.dusun_id', '=', 'dusun.id')
            ->leftJoin('kelas_sosial', 'penduduk.kelas_sosial_id', '=', 'kelas_sosial.id')
            ->select('dusun.desa_id as DesaID', 'dusun.id as DusunID', 'dusun.nama as Nama_Dusun', 'kelas_sosial.id as ID_KelasSosial', 'kelas_sosial.nama as KelasSosial', DB::raw('COUNT(*) as Total'))
            ->groupBy('dusun.nama' ,'kelas_sosial.nama')
            ->get();
        
            return new KelasSosialResource(true, 'List Kelas Sosial', $KelasSosial);
    }
}