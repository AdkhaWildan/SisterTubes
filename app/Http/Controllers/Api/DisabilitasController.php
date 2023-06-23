<?php

namespace App\Http\Controllers\api;

use App\Charts\DataChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Disabilitas;


class DisabilitasController extends Controller
{
     public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $disabilitas_detail = Disabilitas::where('desa_id', $desa->id)->get();
        $labels = collect(['Cacat Fisik', 'Cacat Netra/Buta', 'Cacat Rungu/Wicara', 'Cacat Mental/Jiwa', 'Cacat Fisik dan Mental', 'Cacat Lainnya', 'Tidak Cacat']);
        $data_cfisik = $disabilitas_detail->where('disabilitas', '=', 'Cacat Fisik')->flatten(1)->pluck('total')->sum();
        $data_cbuta = $disabilitas_detail->where('disabilitas', '=', 'Cacat Netra/Buta')->flatten(1)->pluck('total')->sum();
        $data_cwicara = $disabilitas_detail->where('disabilitas', '=', 'Cacat Rungu/Wicara')->flatten(1)->pluck('total')->sum();
        $data_cjiwa = $disabilitas_detail->where('disabilitas', '=', 'Cacat Mental/Jiwa')->flatten(1)->pluck('total')->sum();
        $data_cfisikmental = $disabilitas_detail->where('disabilitas', '=', 'Cacat Fisik dan Mental')->flatten(1)->pluck('total')->sum();
        $data_clainnya = $disabilitas_detail->where('disabilitas', '=', 'Cacat Lainnya')->flatten(1)->pluck('total')->sum();
        $data_normal = $disabilitas_detail->where('disabilitas', '=', 'Tidak Cacat')->flatten(1)->pluck('total')->sum();
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new DataChart;
        $chart ->labels($labels);
        $chart ->dataset('Disabilitas', 'doughnut',[$data_cfisik, $data_cbuta, $data_cwicara, $data_cjiwa, $data_cfisikmental, $data_clainnya, $data_normal])->backgroundColor($colors);;
        return view('apipage.disabilitas', [
            'disabilitas_detail' => Disabilitas::where('desa_id', $desa->id)->get(),
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'title' => 'Disabilitas',
            'chart' => $chart
        ]);
    }
}