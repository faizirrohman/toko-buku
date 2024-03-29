<?php

use App\Http\Controllers\Admin\{DashboardController, BukuController, DistributorController, LaporanController, PasokController, PrintController};
use App\Http\Controllers\Manager\DashboardController as ManagerDashboardController;
use App\Http\Controllers\Manager\{SettingLaporanController};
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

Route::get('/loginn', function () {
    return view('login.index');
});

// ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/buku')->name('buku.')->group(function () {
        Route::get('/index', [BukuController::class, 'index'])->name('index');
        Route::post('/store', [BukuController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BukuController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BukuController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('/distributor')->name('distributor.')->group(function () {
        Route::get('/index', [DistributorController::class, 'index'])->name('index');
        Route::post('/store', [DistributorController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DistributorController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DistributorController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DistributorController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('/pasok')->name('pasok.')->group(function () {
        Route::get('/index', [PasokController::class, 'index'])->name('index');
        Route::post('/store', [PasokController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PasokController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PasokController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PasokController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/laporan')->name('laporan.')->group(function () {
        Route::prefix('/semua-data-buku')->name('semua-data-buku.')->group(function () {
            Route::get('/index', [LaporanController::class, 'semuaDataBuku'])->name('index');
            Route::get('/print', [PrintController::class, 'semuaDataBuku'])->name('print');
            Route::get('/export-excel', [BukuController::class, 'bukuExport'])->name('export');
        });
    });
});

// MANAGER
Route::prefix('manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/setting-laporan')->name('setting-laporan.')->group(function () {
        Route::get('/index', [SettingLaporanController::class, 'index'])->name('index');
        Route::post('/store', [SettingLaporanController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SettingLaporanController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SettingLaporanController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SettingLaporanController::class, 'destroy'])->name('destroy');
    });
});


Route::get('/admin/buku/tambah', function () {
    return view('admin.buku.create');
});

