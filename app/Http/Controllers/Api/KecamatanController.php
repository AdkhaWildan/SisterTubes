<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\DaftarApi;


class KecamatanController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        if (Agama::exists()) {
            $display = 'disabled';
        } else {
            $display = '';
        }
        
        return view('kecamatan', [
            'daftar_desa' => Desa::where('id_kecamatan', $kecamatan->id)->get(),
            'daftar_api' => DaftarApi::all(),
            'daftar_kecamatan' => Kecamatan::all(),
            'kecamatan' =>$kecamatan,
            'desa' => $desa,
            'title' => 'Dashboard - Daftar Kecamatan',
            'display' => $display,
            
        ]);
    }
}