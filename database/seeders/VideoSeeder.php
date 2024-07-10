<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::factory(1)->create([
            'url' => 'https://www.youtube.com/embed/juAK07SB0PI',
            'status' => '1',
            'date' => '2022-01-01'
        ]);
    }
}
