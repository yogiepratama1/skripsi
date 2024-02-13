<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\BobotController;
use App\Http\Controllers\Admin\LaporanController;
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
    Route::get('bobots', [BobotController::class, 'index'])->name('bobots.index');
    Route::get('bobots/create', [BobotController::class, 'create'])->name('bobots.create');
    Route::post('bobots', [BobotController::class, 'store'])->name('bobots.store');
    Route::get('bobots/{bobot}', [BobotController::class, 'show'])->name('bobots.show');
    Route::get('bobots/{bobot}/edit', [BobotController::class, 'edit'])->name('bobots.edit');
    Route::put('bobots/{bobot}', [BobotController::class, 'update'])->name('bobots.update');
    Route::delete('bobots/{bobot}', [BobotController::class, 'destroy'])->name('bobots.destroy');
    Route::delete('bobots/destroy', [BobotController::class, 'massDestroy'])->name('bobots.massDestroy');

    // Test
    Route::get('variables', [VariableController::class, 'index'])->name('variables.index');
    Route::get('variables/create', [VariableController::class, 'create'])->name('variables.create');
    Route::get('variables/hitung', [VariableController::class, 'hitung'])->name('variables.hitung');
    Route::post('variables', [VariableController::class, 'store'])->name('variables.store');
    Route::get('variables/{variable}', [VariableController::class, 'show'])->name('variables.show');
    Route::get('variables/{variable}/edit', [VariableController::class, 'edit'])->name('variables.edit');
    Route::put('variables/{variable}', [VariableController::class, 'update'])->name('variables.update');
    Route::delete('variables/{variable}', [VariableController::class, 'destroy'])->name('variables.destroy');
    Route::delete('variables/destroy', [VariableController::class, 'massDestroy'])->name('variables.massDestroy');

    // Interview
    // Route::get('interviews', [InterviewController::class, 'index'])->name('interviews.index');
    // Route::get('interviews/create', [InterviewController::class, 'create'])->name('interviews.create');
    // Route::post('interviews', [InterviewController::class, 'store'])->name('interviews.store');
    // Route::get('interviews/{interview}', [InterviewController::class, 'show'])->name('interviews.show');
    // Route::get('interviews/{interview}/edit', [InterviewController::class, 'edit'])->name('interviews.edit');
    // Route::put('interviews/{interview}', [InterviewController::class, 'update'])->name('interviews.update');
    // Route::delete('interviews/{interview}', [InterviewController::class, 'destroy'])->name('interviews.destroy');
    // Route::delete('interviews/destroy', [InterviewController::class, 'massDestroy'])->name('interviews.massDestroy');

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
