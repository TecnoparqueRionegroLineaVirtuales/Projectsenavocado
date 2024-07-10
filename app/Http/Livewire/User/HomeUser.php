<?php

namespace App\Http\Livewire\User;

use App\Models\Banner;
use App\Models\Format;
use App\Models\Module;
use App\Models\Station;
use App\Models\Video;
use Livewire\Component;

class HomeUser extends Component
{
    public function render()
    {   
        /*SELECT M.*, F.id, F.url
            FROM modules AS M 
            LEFT JOIN formats AS F 
            ON M.id = F.module_id*/

        $banners = Banner::select('banners.url_photo', 'banners.status','banners.id')
        ->get();

        $videos = Video::select('videos.url', 'videos.status', 'videos.date', 'videos.id')
        ->get();

        $modules = Module::select('modules.name', 'modules.url_photo','modules.description', 'formats.id as format_id', 'formats.url','modules.route', 'modules.url', 'modules.id')
        ->leftjoin('formats', 'formats.module_id', '=', 'modules.id')
        ->orderBy('id', 'asc')
        ->get();

        return view('livewire.user.home-user', compact('modules', 'banners', 'videos'))->layout('layouts.user');
    }
}
