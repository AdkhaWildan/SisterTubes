<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisabilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disabilitas')->insert([
            'id' => 1,
            'nama' => 'Cacat Fisik',   
        ]);

        DB::table('disabilitas')->insert([
            'id' => 2,
            'nama' => 'Cacat Netra/Buta',   
        ]);

        DB::table('disabilitas')->insert([
            'id' => 3,
            'nama' => 'Cacat Rungu/Wicara',   
        ]);

        DB::table('disabilitas')->insert([
            'id' => 4,
            'nama' => 'Cacat Mental/Jiwa',   
        ]);

        DB::table('disabilitas')->insert([
            'id' => 5,
            'nama' => 'Cacat Fisik dan Mental',   
        ]);

        DB::table('disabilitas')->insert([
            'id' => 6,
            'nama' => 'Cacat Lainnya',   
        ]);

        DB::table('disabilitas')->insert([
            'id' => 7,
            'nama' => 'Tidak Cacat',   
        ]);
    }
}
