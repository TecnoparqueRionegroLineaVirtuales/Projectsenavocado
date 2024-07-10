<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Playlist::factory(1)->create([
            'title' => 'Global GAP Versión 5.2',
            'description' => 'Documentos solicitados, procedimientos en campo, infraestructura y muestras de suelo y agua, según la normatividad Global GAP en su versión 5.2',
            'url_photo' => 'storage/img/GAP.jpg',
            'url_playlist' => 'https://www.youtube.com/playlist?list=PLJKazBvVOiaYkOZiap-niOCgan9FNHJ9p',
            'status' => '1'
        ]);

        Playlist::factory(6)->create();
    }
}
