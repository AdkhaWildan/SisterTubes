<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DaftarApi;
use App\Models\Desa;
use App\Models\Agama;
use App\Models\Disabilitas;
use App\Models\StatusKawin;
use App\Models\KelasSosial;
use App\Models\User;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class Harvest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ambil:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ambil data API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $desa = Desa::all();
        $daftarapi = DaftarApi::all();
        
        $progressBar = $this->output->createProgressBar();
        $progressBar->start();
        $this->info('Memulai Harvesting Periode ' . Carbon::now()->format('Y-m-d H:i:s'));
        $this->info('' );

        foreach ($desa as $ndeso) {
            
             $client = new \GuzzleHttp\Client();
             $url_login = "http://" . $ndeso->url_desa . ".test" . "/" . "api/login";
            $response = $client->post($url_login, [
                'form_params' => [
                    'email' => 'coba@mail.com',
                    'password' => '12345678'
                ],
            ]);
             $object = json_decode($response->getBody()->getContents(), true);
             $token = $object['token'];

            $this->info('Harvesting Data ' . $ndeso->nama);
            
            foreach ($daftarapi as $daftar) {
                $this->info('Harvesting API ' . $daftar->nama);
                $url = "http://" . $ndeso->url_desa . ".test" . "/" . "api/" . $daftar->path_api;
                

                $response = $client->get($url, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => "Bearer {$token}"
                    ]
                ]);
                
                $object = json_decode($response->getBody()->getContents(), true);
                $data = $object['data'];

                foreach ($data as $datum) {
                    $datum = (array) $datum;
                    if ($daftar->path_api == 'agama') {
                        Agama::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_nama' => $datum['Nama_Dusun'],
                                'agama_id' => $datum['ID_Agama'],
                                'agama' => $datum['Agama'],
                                'total' => $datum['Total'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                    } elseif ($daftar->path_api == 'disabilitas') {
                        Disabilitas::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_nama' => $datum['Nama_Dusun'],
                                'disabilitas_id' => $datum['ID_Disabilitas'],
                                'disabilitas' => $datum['Disabilitas'],
                                'total' => $datum['Total'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                    } elseif ($daftar->path_api == 'status') {
                        StatusKawin::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_nama' => $datum['Nama_Dusun'],
                                'status_kawin_id' => $datum['ID_StatusKawin'],
                                'status_kawin' => $datum['StatusKawin'],
                                'total' => $datum['Total'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                    } elseif ($daftar->path_api == 'kasta') {
                        KelasSosial::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_nama' => $datum['Nama_Dusun'],
                                'kelas_sosial_id' => $datum['ID_KelasSosial'],
                                'kelas_sosial' => $datum['KelasSosial'],
                                'total' => $datum['Total'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                        
                    };
                };
            };
            $url_logout = "http://" . $ndeso->url_desa . ".test" . "/" . "api/logout";
            $response = $client->post($url_logout, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                    ]
                ]);
                $object = json_decode($response->getBody()->getContents(), true);
                $this->info('Harvesting Data ' . $ndeso->nama . ' Completed !!');
            sleep(1);
            $progressBar->advance();
        };    
        $progressBar->finish();
        $this->info('Semua Data Berhasil Diharvest!!!!');
    }
}