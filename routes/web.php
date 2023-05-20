<?php

use App\Http\Controllers\BerendezesController;
use App\Http\Controllers\UzemController;
use Database\Factories\MeresAdatFactory;
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
    return view('app');
})->name('app');

Route::resource('/uzems', UzemController::class)->only(['index', 'show']);
Route::controller(BerendezesController::class)->group(function () {
    Route::get('/berendezesek/{id}', 'show')->name('berendezesek.show');
});
