<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKawinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_kawin')->insert([
            'id' => 1,
            'nama' => 'Belum Kawin',   
        ]);

        DB::table('status_kawin')->insert([
            'id' => 2,
            'nama' => 'Kawin',   
        ]);

        DB::table('status_kawin')->insert([
            'id' => 3,
            'nama' => 'Cerai Hidup',   
        ]);

        DB::table('status_kawin')->insert([
            'id' => 4,
            'nama' => 'Cerai Mati',   
        ]);
    }
}