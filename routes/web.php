<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StorageLocationController;
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

Route::resource('samples', SampleController::class);
Route::resource('tests', TestController::class);
Route::resource('storage-locations', StorageLocationController::class);
Route::resource('patients', PatientController::class);
Route::get('/test', [TestController::class, 'index']);
Route::get('/storage-locations', [StorageLocationController::class, 'index']);
Route::get('samples/{sample}/pdf', [SampleController::class, 'generatePdf'])->name('samples.generatePdf');
Route::get('samples', [SampleController::class, 'index'])->name('samples.index');
Route::get('samples/all-pdf', [SampleController::class, 'generateAllPdf'])->name('samples.allPdf');