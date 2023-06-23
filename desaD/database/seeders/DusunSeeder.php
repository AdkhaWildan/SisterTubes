<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dusun')->insert([
            'id' => 1,
            'nama' => 'Atas',
            'desa_id' => 4,  
        ]);

        DB::table('dusun')->insert([
            'id' => 2,
            'nama' => 'Bawah',
            'desa_id' => 4,  
        ]);

    }
}