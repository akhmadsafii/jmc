<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ReportController;
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
    session()->put('title', 'Selamat Datang');
    return view('welcome');
});

Route::prefix('provinces')->name('province.')->group(function () {
    Route::get('/', [ProvinceController::class, 'index'])->name('index');
    Route::get('form/{slug?}', [ProvinceController::class, 'form'])->name('form');
    Route::post('update/{id?}', [ProvinceController::class, 'update'])->name('update');
    Route::get('delete/{id}', [ProvinceController::class, 'delete'])->name('delete');
});

Route::prefix('districts')->name('district.')->group(function () {
    Route::get('/', [DistrictController::class, 'index'])->name('index');
    Route::get('form/{slug?}', [DistrictController::class, 'form'])->name('form');
    Route::post('update/{id?}', [DistrictController::class, 'update'])->name('update');
    Route::get('delete/{id}', [DistrictController::class, 'delete'])->name('delete');
});

Route::prefix('reports')->name('report.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::get('get_district/{province?}', [ReportController::class, 'getDistricts'])->name('get_district');
});
