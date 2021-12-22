<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

// Liste des utilisateurs connectés
Route::get('/home/onlineusers', [App\Http\Controllers\HomeController::class, 'onlineusers'])->name('onlineusers');



// listes les départ
Route::get('/aeroport', [App\Http\Controllers\AeroportController::class, 'index'])->name('aeroport.index')->middleware('auth');
Route::get('/aeroport/create', [App\Http\Controllers\AeroportController::class, 'create'])->name('aeroport.create')->middleware('auth');
Route::get('/aeroport/edit/{id}', [App\Http\Controllers\AeroportController::class, 'edit'])->name('aeroport.edit')->middleware('auth');
Route::get('/aeroport/delete/{id}', [App\Http\Controllers\AeroportController::class, 'delete'])->name('aeroport.delete')->middleware('auth');


// Désactive accès dashboard beyonco.de/laravel-websockets depuis environnement production
if (App::environment('production')) {
    Route::get('/laravel-websockets', function () {});
}
