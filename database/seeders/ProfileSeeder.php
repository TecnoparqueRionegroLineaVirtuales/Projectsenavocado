<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::factory(1)->create([
            'name' => 'Productor de aguacate'
        ]);
        Profile::factory(1)->create([
            'name' => 'Académico'
        ]);
        Profile::factory(1)->create([
            'name' => 'Otro'
        ]);
    }
}
