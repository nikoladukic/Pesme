<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategorija;
use \App\Models\User;
use App\Models\Izvodjac;
use App\Models\Pesma;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Kategorija::truncate();
        User::truncate();
        Izvodjac::truncate();
        $this->call([
            KategorijaSeeder::class
        ]);

        // User::factory(5)->create();
        
        // Author::factory(5)->create();        

        Pesma::factory(10)->create();
     
    }
}
