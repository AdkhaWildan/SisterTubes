<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\DaftarApi;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $daftar_api = ['Agama', 'Disabilitas', 'Status Kawin', 'Kelas Sosial', 'Penduduk'];
        $api = ['agama', 'disabilitas', 'status', 'kasta'];
        for ($i = 0; $i < sizeof($api); $i++){
            DaftarApi::create([
                'nama' => $daftar_api[$i],
                'path_api' => $api[$i]
            ]);
        }

        $daftar_kecamatan = ['Utara', 'Selatan'];
        for ($i = 0; $i < sizeof($daftar_kecamatan); $i++){
            Kecamatan::create([
                'nama' => $daftar_kecamatan[$i],
                'url_kecamatan' => strtolower($daftar_kecamatan[$i])
            ]);
        }

        $daftar_desa = ['DesaA', 'DesaB', 'DesaC', 'DesaD'];
        $init = 0;
         for ($i = 1; $i <= sizeof($daftar_kecamatan); $i++){
            for($j=$init; $j < $i*2; $j++){
                Desa::create([
                    'nama' => $daftar_desa[$j],
                    'id_kecamatan' => $i,
                    'url_desa' => strtolower($daftar_desa[$j])
                ]);
            }
            $init += 2;
         }
    }
}