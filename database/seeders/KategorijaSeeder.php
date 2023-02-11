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
        Category::create([
            'name'=>'Pop'
        ]);
        Category::create([
            'name'=>'Classic'
        ]);
        Category::create([
            'name'=>'Folk'
        ]);
        Category::create([
            'name'=>'Rock'
        ]);
        Category::create([
            'name'=>'Pop-Rock'
        ]);
    }
}
