<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\Admin\AssetController;
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

Route::get('/', function () {
    // if (auth()->user()) {
    //     return redirect()->route('dashboard.assets.index');
    // }

    return view('welcome');
});
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
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

    // Assets History
    // Route::get('assets-histories', [AssetsHistoryController::class, 'index'])->name('assets-histories.index');

    // Permintaan
    Route::get('permintaans', [PermintaanController::class, 'index'])->name('permintaans.index');
    Route::get('permintaans/create', [PermintaanController::class, 'create'])->name('permintaans.create');
    Route::post('permintaans', [PermintaanController::class, 'store'])->name('permintaans.store');
    Route::get('permintaans/{permintaan}', [PermintaanController::class, 'show'])->name('permintaans.show');
    Route::get('permintaans/{permintaan}/edit', [PermintaanController::class, 'edit'])->name('permintaans.edit');
    Route::put('permintaans/{permintaan}', [PermintaanController::class, 'update'])->name('permintaans.update');
    Route::delete('permintaans/{permintaan}', [PermintaanController::class, 'destroy'])->name('permintaans.destroy');
    Route::delete('permintaans/destroy', [PermintaanController::class, 'massDestroy'])->name('permintaans.massDestroy');

    // Test
    Route::get('tests', [TestController::class, 'index'])->name('tests.index');
    Route::get('tests/create', [TestController::class, 'create'])->name('tests.create');
    Route::post('tests', [TestController::class, 'store'])->name('tests.store');
    Route::get('tests/{test}', [TestController::class, 'show'])->name('tests.show');
    Route::get('tests/{test}/edit', [TestController::class, 'edit'])->name('tests.edit');
    Route::put('tests/{test}', [TestController::class, 'update'])->name('tests.update');
    Route::delete('tests/{test}', [TestController::class, 'destroy'])->name('tests.destroy');
    Route::delete('tests/destroy', [TestController::class, 'massDestroy'])->name('tests.massDestroy');

    // Interview
    Route::get('interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::get('interviews/create', [InterviewController::class, 'create'])->name('interviews.create');
    Route::post('interviews', [InterviewController::class, 'store'])->name('interviews.store');
    Route::get('interviews/{interview}', [InterviewController::class, 'show'])->name('interviews.show');
    Route::get('interviews/{interview}/edit', [InterviewController::class, 'edit'])->name('interviews.edit');
    Route::put('interviews/{interview}', [InterviewController::class, 'update'])->name('interviews.update');
    Route::delete('interviews/{interview}', [InterviewController::class, 'destroy'])->name('interviews.destroy');
    Route::delete('interviews/destroy', [InterviewController::class, 'massDestroy'])->name('interviews.massDestroy');

    // Laporan
    Route::get('laporans', [LaporanController::class, 'index'])->name('laporans.index');
    Route::post('laporans/create', [LaporanController::class, 'create'])->name('laporans.create');
    Route::get('laporans/create-average', [LaporanController::class, 'createAverageAksesoris'])->name('laporans.create-average');
    Route::post('laporans', [LaporanController::class, 'store'])->name('laporans.store');
    Route::get('laporans/{laporan}', [LaporanController::class, 'show'])->name('laporans.show');
    Route::get('laporans/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporans.edit');
    Route::put('laporans/{laporan}', [LaporanController::class, 'update'])->name('laporans.update');
    Route::delete('laporans/{laporan}', [LaporanController::class, 'destroy'])->name('laporans.destroy');
    Route::delete('laporans/destroy', [LaporanController::class, 'massDestroy'])->name('laporans.massDestroy');
});
