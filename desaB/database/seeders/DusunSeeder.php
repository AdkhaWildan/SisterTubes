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
            'nama' => 'Depan',
            'desa_id' => 2,  
        ]);

        DB::table('dusun')->insert([
            'id' => 2,
            'nama' => 'Belakang',
            'desa_id' => 2,  
        ]);

    }
}