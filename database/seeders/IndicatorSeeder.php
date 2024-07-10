<?php

namespace Database\Seeders;

use App\Models\Indicator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indicator::factory(1)->create([
            'name' => 'Temperatura'
        ]);
        Indicator::factory(1)->create([
            'name' => 'Humedad'
        ]);
        Indicator::factory(1)->create([
            'name' => 'Lluvia'
        ]);
        Indicator::factory(1)->create([
            'name' => 'VelocidadViento'
        ]);
        Indicator::factory(1)->create([
            'name' => 'HumedadSuelo'
        ]);
        Indicator::factory(1)->create([
            'name' => 'SensacionTermica'
        ]);
    }
}
