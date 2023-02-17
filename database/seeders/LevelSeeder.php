<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        level::create([
            'name' => 'LECHERIA'
        ]);

        level::create([
            'name' => 'LAGO DE GPE'
        ]);

        level::create([
            'name' => 'ATIZAPAN SUR'
        ]);

        level::create([
            'name' => 'ATIZAPAN NORTE'
        ]);

        level::create([
            'name' => 'EL VIDRIO'
        ]);

        level::create([
            'name' => 'LOMAS VERDES'
        ]);

        level::create([
            'name' => 'GUADALUPE'
        ]);

        level::create([
            'name' => 'INSURGENTES'
        ]);

        level::create([
            'name' => 'PATERA'
        ]);

        level::create([
            'name' => 'RIO DE LOS REMEDIOS'
        ]);

        
    }
}
