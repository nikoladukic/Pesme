<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategorija;


class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategorija::create([
            'name'=>'Pop'
        ]);
        Kategorija::create([
            'name'=>'Classic'
        ]);
        Kategorija::create([
            'name'=>'Folk'
        ]);
        Kategorija::create([
            'name'=>'Rock'
        ]);
        Kategorija::create([
            'name'=>'Pop-Rock'
        ]);
    }
}
