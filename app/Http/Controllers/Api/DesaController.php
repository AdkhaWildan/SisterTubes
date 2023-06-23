<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\DaftarApi;

class DesaController extends Controller
{
    public function index(DaftarApi $daftar_api, Desa $desa, Kecamatan $kecamatan)
    {
        return view('desa', [
            'daftar_desa' => Desa::where('id_kecamatan', $kecamatan->id)->get(),
            'daftar_api' => DaftarApi::all(),
            'kecamatan' => $kecamatan,
            'api' => $daftar_api,
            'desa' => $desa,
            'title' => 'Daftar Desa'
        ]);
    }
}