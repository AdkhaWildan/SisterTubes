<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
            DB::table('penduduk')->insert([
            
            'nama'=> $faker->name,
            'nik' => $faker->numberBetween($min = 3300000000000000, $max = 4000000000000000),
            'dusun_id' =>$faker->numberBetween(1,2),
            'agama_id' =>$faker->numberBetween(1,7),
            'disabilitas_id' =>$faker->numberBetween(1,7),
            'status_kawin_id'=>$faker->numberBetween(1,4),
            'kelas_sosial_id'=>$faker->numberBetween(1,3),
            ]);
            
    }
    }
}        