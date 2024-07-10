<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\User\Calculator;
use App\Http\Livewire\User\Document;
use App\Http\Livewire\User\Documents;
use App\Http\Livewire\User\HomeUser;
use App\Http\Livewire\User\Indicators;
use App\Http\Livewire\User\ResultsCalculator;
use App\Http\Livewire\User\Stations;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Livewire\Admin\Playlists;
use App\Http\Livewire\User\PlaylistsUser;
use App\Models\Playlist;


Route::get('home', HomeUser::class)->name('user.index');

Route::get('calculator', Calculator::class)->name('user.calculator');

Route::get('Stations', Stations::class)->name('user.station');

Route::get('ResultsCalculatorData', ResultsCalculator::class)->name('user.resultsCalculator');

Route::get('document', Documents::class)->name('user.document');

Route::get('indicator', Indicators::class)->name('user.indicator');

Route::get('playlists', PlaylistsUser::class)->name('user.palylist');

Route::name('download')->get('documents/downcurriculum/{id}', [App\Http\Controllers\DownloadDocument::class, 'downcurriculum']);

Route::name('format.download')->get('formats/downcurriculum/{id}', [App\Http\Controllers\DownloadFormat::class, 'downcurriculum']);

//Rutas para llamar los perfiles, paises, departamentos y municipios de la bd al formulario de registro

Route::name('user.getprofiles')->get('getprofiles', [ProfileController::class, 'getProfiles']);

Route::name('user.getcountries')->get('getcountries', [CountryController::class, 'getCountries']);

Route::name('user.getdepartments')->get('getdepartments', [DepartmentController::class, 'getDepartments']);

Route::name('municipalities.getmunicipalitiesfordpt')->get('getmunicipalitiesfordpt', [MunicipalityController::class, 'getMunicipalitiesForDpt']);


