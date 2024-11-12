<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Armazém 1',
            'Armazém 2',
            'Armazém 3',
            'Armazém 4'
        ];

        foreach ($data as $location) {
            Location::create([
                'title' => $location,
            ]);
        }
    }
}
