<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Format::factory(1)->create([
            'url' => 'storage/formats/Lista-Graf-Recomd.xlsx',
            'module_id' => '2'
        ]);
        Format::factory(1)->create([
            'url' => 'storage/formats/MATRIZ 2020 SENA Costos Pdccion año 1 a 7.xlsm',
            'module_id' => '5'
        ]);
    }
}
