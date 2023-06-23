<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KelasSosial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        AgamaSeeder::class,
        DisabilitasSeeder::class, 
        DusunSeeder::class,
        KelasSosialSeeder::class,
        PendudukSeeder::class,
        StatusKawinSeeder::class,
        
      ]);
    }
}