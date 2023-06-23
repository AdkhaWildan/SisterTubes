<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas_sosial')->insert([
            'id' => 1,
            'nama' => 'Atas',   
        ]);

        DB::table('kelas_sosial')->insert([
            'id' => 2,
            'nama' => 'Menengah',   
        ]);

        DB::table('kelas_sosial')->insert([
            'id' => 3,
            'nama' => 'Bawah',   
        ]);

        
    }
}