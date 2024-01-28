<?php

use App\Http\Controllers\Apps\JenisAkunController;
use App\Http\Controllers\Apps\JenisKasController;
use App\Http\Controllers\Apps\KasKeluarController;
use App\Http\Controllers\Apps\KasMasukController;
use App\Http\Controllers\Apps\KasTransferController;
use App\Http\Controllers\Apps\LaporanLabaController;
use App\Http\Controllers\Apps\LaporanNeracaSaldoController;
use App\Http\Controllers\Apps\LaporanTransaksiKasController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;
use App\Http\Controllers\Apps\RoleController;
use App\Http\Controllers\Apps\UserController;
use App\Http\Controllers\Apps\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'app', 'as' => 'app.'], function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
        return view('pages.app.dashboard');
    })->name('home');

    // Permission Route
    Route::resource('/permissions', PermissionController::class)->middleware('permission:permissions.index|permissions.create|permissions.edit|permissions.delete');

    // Roles Route
    Route::resource('/roles', RoleController::class)->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');

    //Users Route
    Route::resource('/users', UserController::class)->middleware('permission:users.index|users.create|users.edit|users.delete');

    Route::resource('/jenis-akun', JenisAkunController::class);
    Route::resource('/jenis-kas', JenisKasController::class);
    Route::resource('/kas-masuk', KasMasukController::class);
    Route::resource('/kas-keluar', KasKeluarController::class);
    Route::resource('/kas-transfer', KasTransferController::class);
    Route::resource('/laporan-transaksi-kas', LaporanTransaksiKasController::class);
    Route::resource('/laporan-neraca-saldo', LaporanNeracaSaldoController::class);
    Route::resource('/laporan-laba', LaporanLabaController::class);
});
