<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\StatusKawin;
use App\Charts\DataChart;

class StatusKawinController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $status_kawin_detail = StatusKawin::where('desa_id', $desa->id)->get();
        $labels = collect(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
        $data_belum = $status_kawin_detail->where('status_kawin', '=', 'Belum Kawin')->flatten(1)->pluck('total')->sum();
        $data_kawin = $status_kawin_detail->where('status_kawin', '=', 'Kawin')->flatten(1)->pluck('total')->sum();
        $data_hidup = $status_kawin_detail->where('status_kawin', '=', 'Cerai Hidup')->flatten(1)->pluck('total')->sum();
        $data_mati = $status_kawin_detail->where('status_kawin', '=', 'Cerai Mati')->flatten(1)->pluck('total')->sum();
         $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new DataChart;
        $chart ->labels($labels);
        $chart ->dataset('Status Kawin', 'doughnut',[$data_belum, $data_hidup, $data_kawin, $data_mati])->backgroundColor($colors);
        return view('apipage.statuskawin', [
            'status_kawin_detail' => StatusKawin::where('desa_id', $desa->id)->get(),
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'title' => 'Status Kawin',
            'chart' => $chart
        ]);
    }
}