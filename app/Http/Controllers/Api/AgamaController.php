<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Agama;
use App\Charts\DataChart;

class AgamaController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $agama = Agama::where('desa_id', $desa->id)->get();
        $labels = collect(['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Khonghucu', 'Kepercayaan Terhadap Tuhan YME / Lainnya']);
        $data_islam = $agama->where('agama', '=', 'Islam')->flatten(1)->pluck('total')->sum();
        $data_kristen = $agama->where('agama', '=', 'Kristen')->flatten(1)->pluck('total')->sum();
        $data_katholik = $agama->where('agama', '=', 'Katholik')->flatten(1)->pluck('total')->sum();
        $data_hindu = $agama->where('agama', '=', 'Hindu')->flatten(1)->pluck('total')->sum();
        $data_budha = $agama->where('agama', '=', 'Budha')->flatten(1)->pluck('total')->sum();
        $data_khonghucu = $agama->where('agama', '=', 'Khonghucu')->flatten(1)->pluck('total')->sum();
        $data_lainnya = $agama->where('agama', '=', 'Kepercayaan lainnya')->flatten(1)->pluck('total')->sum();
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });

        $chart = new DataChart;
        $chart ->labels($labels);
        $chart ->dataset('Agama', 'doughnut',[$data_islam, $data_kristen, $data_katholik, $data_hindu, $data_budha, $data_khonghucu, $data_lainnya])->backgroundColor($colors);;
        return view('apipage.agama', [
            'agama_detail' => Agama::where('desa_id', $desa->id)->get(),
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'title' => 'Agama ',
            'chart' => $chart
        ]);

    }
}