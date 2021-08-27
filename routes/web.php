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

Route::prefix("lecturer")->group(function() {
    Route::get('/', [App\Http\Controllers\LecturerController::class, 'index'])->name('lecturer');
    Route::get('/details/{id}', [App\Http\Controllers\LecturerController::class, 'details'])->name('lecturer.details');
    Route::get('/statistics/{id}', [App\Http\Controllers\LecturerController::class, 'getStatistics'])->name('lecturer.statistics');
    Route::get('/search/', [App\Http\Controllers\LecturerController::class, 'search'])->name('lecturer.search');
    Route::get('/vote/{id}', [App\Http\Controllers\LecturerController::class, 'vote'])->name('lecturer.vote');
    Route::post('/vote/{id}', [App\Http\Controllers\LecturerController::class, 'votesave'])->name('lecturer.votesave');
});


Route::get('/faculties', [App\Http\Controllers\FacultyController::class, 'index'])->name('faculties');
