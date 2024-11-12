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
        $data = [
            'Periféricos',
            'Computadores',
            'Celulares',
            'Hardwares',
            'Eletrodomésticos'
        ];

        foreach ($data as $d) {
            Category::create([
               'title' => $d
            ]);
        }
    }
}
