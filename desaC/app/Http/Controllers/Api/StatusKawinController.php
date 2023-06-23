<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StatusKawin;
use App\Http\Resources\StatusKawinResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class StatusKawinController extends Controller
{
    public function index(){
        $StatusKawin = DB::table('penduduk')
            ->leftJoin('dusun', 'penduduk.dusun_id', '=', 'dusun.id')
            ->leftJoin('status_kawin', 'penduduk.status_kawin_id', '=', 'status_kawin.id')
            ->select('dusun.desa_id as DesaID', 'dusun.id as DusunID', 'dusun.nama as Nama_Dusun', 'status_kawin.id as ID_StatusKawin', 'status_kawin.nama as StatusKawin', DB::raw('COUNT(*) as Total'))
            ->groupBy('dusun.nama' ,'status_kawin.nama')
            ->get();
        
            return new StatusKawinResource(true, 'List Status Kawin', $StatusKawin);
    }
}