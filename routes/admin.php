<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Authors;
use App\Http\Livewire\Admin\Banners;
use App\Http\Livewire\Admin\CreateAuthor;
use App\Http\Livewire\Admin\CreateBanner;
use App\Http\Livewire\Admin\CreateDocument;
use App\Http\Livewire\Admin\CreateFormat;
use App\Http\Livewire\Admin\CreateModule;
use App\Http\Livewire\Admin\CreatePlaylist;
use App\Http\Livewire\Admin\CreateStation;
use App\Http\Livewire\Admin\CreateVereda;
use App\Http\Livewire\Admin\CreateVideo;
use App\Http\Livewire\Admin\Documents;
use App\Http\Livewire\Admin\Download;
use App\Http\Livewire\Admin\EditAuthor;
use App\Http\Livewire\Admin\EditBanner;
use App\Http\Livewire\Admin\EditDocument;
use App\Http\Livewire\Admin\EditFormat;
use App\Http\Livewire\Admin\EditModule;
use App\Http\Livewire\Admin\EditPlaylist;
use App\Http\Livewire\Admin\EditStation;
use App\Http\Livewire\Admin\EditVereda;
use App\Http\Livewire\Admin\EditVideo;
use App\Http\Livewire\Admin\Formats;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Modules;
use App\Http\Livewire\Admin\Playlists;
use App\Http\Livewire\Admin\Stations;
use App\Http\Livewire\Admin\UserEdit;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\Veredas;
use App\Http\Livewire\Admin\Videos;
use App\Http\Livewire\User\Documents as UserDocuments;
use Illuminate\Support\Facades\Route;

//Ruta para promover y restringir roles
Route::get('/', Home::class)->middleware('can:admin.index')->name('admin.index');
Route::get('users', Users::class)->middleware('can:superadmin.users.index')->name('superadmin.users.index');
//Route::get('user/edit/{id}', UserEdit::class)->middleware('can:admin.modules.index')->name('superadmin.users.edit');

//Rutas para los banners
Route::get('banners', Banners::class)->middleware('can:admin.banners.index')->name('admin.banners.index');
Route::get('banner/create', CreateBanner::class)->middleware('can:admin.banner.create')->name('admin.banner.create');
Route::get('banner/edit/{id}', EditBanner::class)->middleware('can:admin.banner.edit')->name('admin.banner.edit');

//Rutas para los módulos
Route::get('modules', Modules::class)->middleware('can:admin.modules.index')->name('admin.modules.index');
//Route::get('module/create', CreateModule::class)->name('admin.module.create');
Route::get('module/edit/{id}', EditModule::class)->middleware('can:admin.module.edit')->name('admin.module.edit');

//Rutas para los videos
Route::get('videos', Videos::class)->middleware('can:admin.videos.index')->name('admin.videos.index');
Route::get('video/create', CreateVideo::class)->middleware('can:admin.video.create')->name('admin.video.create');
Route::get('video/edit/{id}', EditVideo::class)->middleware('can:admin.video.edit')->name('admin.video.edit');

//Rutas para los formatos
Route::get('formats', Formats::class)->middleware('can:admin.formats.index')->name('admin.formats.index');
Route::get('format/create', CreateFormat::class)->middleware('can:admin.format.create')->name('admin.format.create');
Route::get('format/edit/{id}', EditFormat::class)->middleware('can:admin.format.edit')->name('admin.format.edit');

//Rutas para las estaciones
Route::get('stations', Stations::class)->middleware('can:admin.stations.index')->name('admin.stations.index');
Route::get('station/create', CreateStation::class)->middleware('can:admin.station.create')->name('admin.station.create');
Route::get('station/edit/{id}', EditStation::class)->middleware('can:admin.station.edit')->name('admin.station.edit');

//Rutas para el autor
Route::get('authors', Authors::class)->middleware('can:admin.authors.index')->name('admin.authors.index');
Route::get('author/edit/{id}', EditAuthor::class)->middleware('can:admin.author.edit')->name('admin.author.edit');
Route::get('author/create', CreateAuthor::class)->middleware('can:admin.author.create')->name('admin.author.create');

//Rutas para el documento
Route::get('documents', Documents::class)->middleware('can:admin.documents.index')->name('admin.documents.index');
Route::get('document/edit/{id}', EditDocument::class)->middleware('can:admin.document.edit')->name('admin.document.edit');
Route::get('document/create', CreateDocument::class)->middleware('can:admin.document.create')->name('admin.document.create');

//Rutas para la playlist
Route::get('playlists', Playlists::class)->middleware('can:admin.playlists.index')->name('admin.playlists.index');
Route::get('playlist/create', CreatePlaylist::class)->middleware('can:admin.playlist.create')->name('admin.playlist.create');
Route::get('playlist/edit/{id}', EditPlaylist::class)->middleware('can:admin.playlist.edit')->name('admin.playlist.edit');

//Rutas para las veredas
Route::get('veredas', Veredas::class)->middleware('can:admin.veredas.index')->name('admin.veredas.index');
Route::get('vereda/create', CreateVereda::class)->middleware('can:admin.vereda.create')->name('admin.vereda.create');
Route::get('vereda/edit/{id}', EditVereda::class)->middleware('can:admin.vereda.edit')->name('admin.vereda.edit');

//Rutas para la descarga de documentos y formatos
Route::name('admin.download')->get('documents/downcurriculum/{id}', [App\Http\Controllers\DownloadDocument::class, 'downcurriculum']);
Route::name('admin.format.download')->get('formats/downcurriculum/{id}', [App\Http\Controllers\DownloadFormat::class, 'downcurriculum']);