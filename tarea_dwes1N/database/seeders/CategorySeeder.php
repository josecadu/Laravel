<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $valores=[
            'alimentacion'=>'#FFD733',
            'deportes'=>'#3357FF',
            'farmacia'=>'#33FF57',
            'electronica'=>'#FF5733',
            'papeleria'=>'#FF33A8'
        ];
        ksort($valores);
        foreach($valores as $nombre=>$color){
            Category::create(compact('nombre','color'));
        }
        
    }
}
