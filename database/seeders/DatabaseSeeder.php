<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(FormatSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(VeredaSeeder::class);
        $this->call(StationSeeder::class);
        $this->call(IndicatorSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(PlaylistSeeder::class);
    }
}
