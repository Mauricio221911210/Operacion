<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Mantenimiento a Redes Areas', 
            
        ]);

        Price::create([
            'name' => 'Mantenimiento Subterraneas',
            
        ]);

        Price::create([
            'name' => 'Mantenimiento a Subestaciones',
            
        ]);

        Price::create([
            'name' => 'Mantenimeinto a Lineas',
            
        ]);

        Price::create([
            'name' => 'Operación y Analisis', 
            
        ]);

        Price::create([
            'name' => 'CCD', 
            
        ]);

        Price::create([
            'name' => 'Protecciones', 
            
        ]);

        Price::create([
            'name' => 'Comunicación y Control', 
            
        ]);

        Price::create([
            'name' => 'Calidad de la Energía', 
            
        ]);
    }
}
