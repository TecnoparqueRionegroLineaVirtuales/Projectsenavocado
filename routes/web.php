<?php

use App\Http\Livewire\User\HomeGuest;
use App\Http\Livewire\User\HomeUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/Panel', function () {
        return view('Panel');
    })->name('Panel');
});

Route::get('/', [HomeGuest::class, 'render'])->name('homeGuest');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], __DIR__ . '/frontend/user.php');

/*Route::get('/home', function () {
    return view('livewire.user.home-user');
})->name('home');*/

//Route::name('home')->get('home', App\Http\Livewire\User\HomeUser::class);

