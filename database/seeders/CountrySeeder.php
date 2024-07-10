<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('countries.sql');
        DB::unprepared(file_get_contents($path));
        //Country::factory(6)->create();
    }
}
