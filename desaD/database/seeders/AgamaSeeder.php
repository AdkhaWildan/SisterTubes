<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('agama')->insert([
            'id' => 1,
            'nama' => 'Islam',   
        ]);

        DB::table('agama')->insert([
            'id' => 2,
            'nama' => 'Kristen',   
        ]);

        DB::table('agama')->insert([
            'id' => 3,
            'nama' => 'Katholik',   
        ]);

        DB::table('agama')->insert([
            'id' => 4,
            'nama' => 'Hindu',   
        ]);

        DB::table('agama')->insert([
            'id' => 5,
            'nama' => 'Budha',   
        ]);

        DB::table('agama')->insert([
            'id' => 6,
            'nama' => 'Khonghucu',   
        ]);

        DB::table('agama')->insert([
            'id' => 7,
            'nama' => 'Kepercayaan Terhadap Tuhan YME / Lainnya',   
        ]);
    }
}