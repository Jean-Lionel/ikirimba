<?php

use App\Http\Controllers\CollineController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\GroupementController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProvinceController;
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

//Route::get('/',[PersonController::class,'index'])


Route::resource('communes', CommuneController::class);
Route::resource('provinces', ProvinceController::class);
Route::resource('collines', CollineController::class);
Route::resource('groupements', GroupementController::class);
Route::resource('people', PersonController::class);
Route::resource('contributions', ContributionController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
