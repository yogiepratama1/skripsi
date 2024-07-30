<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PermintaanController;
use App\Http\Controllers\Admin\AssetStatusController;
use App\Http\Controllers\Admin\AssetCategoryController;

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

Route::get('/', function() {
        // if (auth()->user()) {
        //     return redirect()->route('dashboard.assets.index');
        // }
    
        return view('welcome');
    });
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [LoginController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Admin','middleware' => 'auth'], function () {
    // Asset Category
    Route::get('asset-categories', [AssetCategoryController::class, 'index'])->name('asset-categories.index');
    Route::get('asset-categories/create', [AssetCategoryController::class, 'create'])->name('asset-categories.create');
    Route::post('asset-categories', [AssetCategoryController::class, 'store'])->name('asset-categories.store');
    Route::get('asset-categories/{asset_category}', [AssetCategoryController::class, 'show'])->name('asset-categories.show');
    Route::get('asset-categories/{asset_category}/edit', [AssetCategoryController::class, 'edit'])->name('asset-categories.edit');
    Route::put('asset-categories/{asset_category}', [AssetCategoryController::class, 'update'])->name('asset-categories.update');
    Route::delete('asset-categories/{asset_category}', [AssetCategoryController::class, 'destroy'])->name('asset-categories.destroy');
    Route::delete('asset-categories/destroy', [AssetCategoryController::class, 'massDestroy'])->name('asset-categories.massDestroy');

    // Asset Status
    Route::get('asset-statuses', [AssetStatusController::class, 'index'])->name('asset-statuses.index');
    Route::get('asset-statuses/create', [AssetStatusController::class, 'create'])->name('asset-statuses.create');
    Route::post('asset-statuses', [AssetStatusController::class, 'store'])->name('asset-statuses.store');
    Route::get('asset-statuses/{asset_status}', [AssetStatusController::class, 'show'])->name('asset-statuses.show');
    Route::get('asset-statuses/{asset_status}/edit', [AssetStatusController::class, 'edit'])->name('asset-statuses.edit');
    Route::put('asset-statuses/{asset_status}', [AssetStatusController::class, 'update'])->name('asset-statuses.update');
    Route::delete('asset-statuses/{asset_status}', [AssetStatusController::class, 'destroy'])->name('asset-statuses.destroy');
    Route::delete('asset-statuses/destroy', [AssetStatusController::class, 'massDestroy'])->name('asset-statuses.massDestroy');

    // Asset
    Route::get('assets', [AssetController::class, 'index'])->name('assets.index');
    Route::get('assets/create', [AssetController::class, 'create'])->name('assets.create');
    Route::post('assets', [AssetController::class, 'store'])->name('assets.store');
    Route::get('assets/{asset}', [AssetController::class, 'show'])->name('assets.show');
    Route::get('assets/{asset}/edit', [AssetController::class, 'edit'])->name('assets.edit');
    Route::put('assets/{asset}', [AssetController::class, 'update'])->name('assets.update');
    Route::delete('assets/{asset}', [AssetController::class, 'destroy'])->name('assets.destroy');
    Route::delete('assets/destroy', [AssetController::class, 'massDestroy'])->name('assets.massDestroy');

    // Absensi
    Route::get('absensis', [AbsensiController::class, 'index'])->name('absensis.index');
    Route::get('absensis/create', [AbsensiController::class, 'create'])->name('absensis.create');
    Route::post('absensis', [AbsensiController::class, 'store'])->name('absensis.store');
    Route::get('absensis/{absensi}', [AbsensiController::class, 'show'])->name('absensis.show');
    Route::get('absensis/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensis.edit');
    Route::get('absensis/{absensi}/absen', [AbsensiController::class, 'absen'])->name('absensis.absen');
    Route::put('absensis/{absensi}', [AbsensiController::class, 'update'])->name('absensis.update');
    Route::post('absensis/{absensi}/absen', [AbsensiController::class, 'updateAbsen'])->name('absensis.update.absen');
    Route::delete('absensis/{absensi}', [AbsensiController::class, 'destroy'])->name('absensis.destroy');
    Route::delete('absensis/destroy', [AbsensiController::class, 'massDestroy'])->name('absensis.massDestroy');

    // Assets History
    Route::get('assets-histories', [AssetsHistoryController::class, 'index'])->name('assets-histories.index');

    // Permintaan
    Route::get('permintaans', [PermintaanController::class, 'index'])->name('permintaans.index');
    Route::get('permintaans/create', [PermintaanController::class, 'create'])->name('permintaans.create');
    Route::post('permintaans', [PermintaanController::class, 'store'])->name('permintaans.store');
    Route::get('permintaans/{permintaan}', [PermintaanController::class, 'show'])->name('permintaans.show');
    Route::get('permintaans/{permintaan}/edit', [PermintaanController::class, 'edit'])->name('permintaans.edit');
    Route::get('permintaans/{permintaan}/setujui', [PermintaanController::class, 'setujui'])->name('permintaans.setujui');
    Route::get('permintaans/{permintaan}/bayar', [PermintaanController::class, 'bayar'])->name('permintaans.bayar');
    Route::put('permintaans/{permintaan}', [PermintaanController::class, 'update'])->name('permintaans.update');
    Route::delete('permintaans/{permintaan}', [PermintaanController::class, 'destroy'])->name('permintaans.destroy');
    Route::delete('permintaans/destroy', [PermintaanController::class, 'massDestroy'])->name('permintaans.massDestroy');

    // Pembayaran
    Route::get('pembayarans', [PembayaranController::class, 'index'])->name('pembayarans.index');
    Route::get('pembayarans/create', [PembayaranController::class, 'create'])->name('pembayarans.create');
    Route::post('pembayarans', [PembayaranController::class, 'store'])->name('pembayarans.store');
    Route::get('pembayarans/{pembayaran}', [PembayaranController::class, 'show'])->name('pembayarans.show');
    Route::get('pembayarans/{pembayaran}/edit', [PembayaranController::class, 'edit'])->name('pembayarans.edit');
    Route::put('pembayarans/{pembayaran}', [PembayaranController::class, 'update'])->name('pembayarans.update');
    Route::delete('pembayarans/{pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayarans.destroy');
    Route::delete('pembayarans/destroy', [PembayaranController::class, 'massDestroy'])->name('pembayarans.massDestroy');

    // Laporan
    Route::get('laporans', [LaporanController::class, 'index'])->name('laporans.index');
    Route::get('laporans/create', [LaporanController::class, 'create'])->name('laporans.create');
    Route::post('laporans', [LaporanController::class, 'store'])->name('laporans.store');
    Route::get('laporans/{laporan}', [LaporanController::class, 'show'])->name('laporans.show');
    Route::get('laporans/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporans.edit');
    Route::put('laporans/{laporan}', [LaporanController::class, 'update'])->name('laporans.update');
    Route::delete('laporans/{laporan}', [LaporanController::class, 'destroy'])->name('laporans.destroy');
    Route::delete('laporans/destroy', [LaporanController::class, 'massDestroy'])->name('laporans.massDestroy');
});

