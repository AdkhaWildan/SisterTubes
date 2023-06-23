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
            'nama' => 'Maju',
            'desa_id' => 1,  
        ]);

        DB::table('dusun')->insert([
            'id' => 2,
            'nama' => 'Mundur',
            'desa_id' => 1,  
        ]);

    }
}