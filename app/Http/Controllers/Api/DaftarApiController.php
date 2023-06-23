<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarApi;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DaftarApiController extends Controller
{
    public function index( Kecamatan $kecamatan,DaftarApi $daftar_api, Desa $desa)
    {
        return view('apipage.homepage', [
            'daftar_desa' => Desa::where('id_kecamatan', $kecamatan->id)->get(),
            'daftar_api' => DaftarApi::all(),
            'kecamatan' => $kecamatan,
            'api' => $daftar_api,
            'desa' => $desa,
            'title' => 'Daftar Api'
        ]);
    }
}