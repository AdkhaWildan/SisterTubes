<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\KelasSosial;
use App\Charts\DataChart;

class KelasSosialController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $kelas_sosial_detail= KelasSosial::where('desa_id', $desa->id)->get();
        $labels = collect(['Atas', 'Menengah', 'Bawah']);
        $data_atas = $kelas_sosial_detail->where('kelas_sosial', '=', 'Atas')->flatten(1)->pluck('total')->sum();
        $data_menengah = $kelas_sosial_detail->where('kelas_sosial', '=', 'Menengah')->flatten(1)->pluck('total')->sum();
        $data_bawah = $kelas_sosial_detail->where('kelas_sosial', '=', 'Bawah')->flatten(1)->pluck('total')->sum();
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new DataChart;
        $chart ->labels($labels);
        $chart ->dataset('Kelas Sosial', 'doughnut',[$data_atas, $data_menengah, $data_bawah])->backgroundColor($colors);;
        return view('apipage.kelassosial', [
            'kelas_sosial_detail' => KelasSosial::where('desa_id', $desa->id)->get(),
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'title' => 'Kelas Sosial',
            'chart' => $chart
        ]);
    }
}