<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PermintaanController;
use App\Http\Controllers\Admin\AssetStatusController;
use App\Http\Controllers\Admin\AssetCategoryController;
use App\Http\Controllers\Admin\FormulirPendaftaranController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\PerancanganController;
use App\Models\FormulirPendaftaran;
use App\Models\Penilaian;

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
Route::post('register', [LoginController::class, 'register'])->name('register');
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
    Route::get('penilaians', [PenilaianController::class, 'index'])->name('penilaians.index');
    Route::get('penilaians/create', [PenilaianController::class, 'create'])->name('penilaians.create');
    Route::post('penilaians', [PenilaianController::class, 'store'])->name('penilaians.store');
    Route::get('penilaians/{penilaian}', [PenilaianController::class, 'show'])->name('penilaians.show');
    Route::get('penilaians/{penilaian}/edit', [PenilaianController::class, 'edit'])->name('penilaians.edit');
    Route::get('penilaians/{penilaian}/proses', [PenilaianController::class, 'proses'])->name('penilaians.proses');
    Route::get('penilaians/{penilaian}/setujui', [PenilaianController::class, 'setujui'])->name('penilaians.setujui');
    Route::get('penilaians/{penilaian}/cetakKartu', [PenilaianController::class, 'cetakKartu'])->name('penilaians.cetakKartu');
    Route::put('penilaians/{penilaian}', [PenilaianController::class, 'update'])->name('penilaians.update');
    Route::delete('penilaians/{penilaian}', [PenilaianController::class, 'destroy'])->name('penilaians.destroy');
    Route::delete('penilaians/destroy', [PenilaianController::class, 'massDestroy'])->name('penilaians.massDestroy');

    // Assets History
    Route::get('assets-histories', [AssetsHistoryController::class, 'index'])->name('assets-histories.index');

    // Permintaan
    Route::get('permintaans', [PermintaanController::class, 'index'])->name('permintaans.index');
    Route::get('permintaans/create', [PermintaanController::class, 'create'])->name('permintaans.create');
    Route::get('permintaans/{permintaan}/kepuasan', [PermintaanController::class, 'kepuasan'])->name('permintaans.kepuasan');
    Route::post('permintaans/{permintaan}/kepuasan', [PermintaanController::class, 'storeKepuasan'])->name('permintaans.kepuasan.update');
    Route::post('permintaans', [PermintaanController::class, 'store'])->name('permintaans.store');
    Route::get('permintaans/{permintaan}', [PermintaanController::class, 'show'])->name('permintaans.show');
    Route::get('permintaans/{permintaan}/edit', [PermintaanController::class, 'edit'])->name('permintaans.edit');
    Route::get('permintaans/{permintaan}/promo', [PermintaanController::class, 'perancangan'])->name('permintaans.perancangan');
    Route::put('permintaans/{permintaan}', [PermintaanController::class, 'update'])->name('permintaans.update');
    Route::delete('permintaans/{permintaan}', [PermintaanController::class, 'destroy'])->name('permintaans.destroy');
    Route::delete('permintaans/destroy', [PermintaanController::class, 'massDestroy'])->name('permintaans.massDestroy');

    // Pembayaran
    Route::get('promos', [PerancanganController::class, 'index'])->name('perancangans.index');
    Route::get('promos/create/{permintaan}', [PerancanganController::class, 'create'])->name('perancangans.create');
    Route::post('perancangans', [PerancanganController::class, 'store'])->name('perancangans.store');
    Route::get('perancangans/{perancangan}', [PerancanganController::class, 'show'])->name('perancangans.show');
    Route::get('perancangans/{perancangan}/setujui', [PerancanganController::class, 'setujui'])->name('perancangans.setujui');
    Route::get('perancangans/{perancangan}/mulai', [PerancanganController::class, 'mulai'])->name('perancangans.mulai');
    Route::get('perancangans/{perancangan}/tolak', [PerancanganController::class, 'tolak'])->name('perancangans.tolak');
    Route::get('promos/{perancangan}/edit', [PerancanganController::class, 'edit'])->name('perancangans.edit');
    Route::put('perancangans/{perancangan}', [PerancanganController::class, 'update'])->name('perancangans.update');
    Route::delete('perancangans/{perancangan}', [PerancanganController::class, 'destroy'])->name('perancangans.destroy');
    Route::delete('perancangans/destroy', [PerancanganController::class, 'massDestroy'])->name('perancangans.massDestroy');

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

