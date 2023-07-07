<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $component = new \App\Http\Livewire\MovieDetail();
    $firstMovieId = $component->getFirstMovieId(); 
    return redirect('/movie/' . $firstMovieId);
});


Route::get('/movie/{id}', \App\Http\Livewire\MovieDetail::class)->name('movie-detail');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
