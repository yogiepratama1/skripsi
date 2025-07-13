<?php

use App\Http\Controllers\WorkOrderAssigneeController;
use App\Http\Controllers\WorkOrderEvaluationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\WorkOrderController;
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
    })->name('homepage');
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
    Route::get('permintaans', [WorkOrderController::class, 'index'])->name('permintaans.index');
    Route::get('permintaans/create', [WorkOrderController::class, 'create'])->name('permintaans.create');
    Route::get('permintaans/{permintaan}/kepuasan', [WorkOrderController::class, 'kepuasan'])->name('permintaans.kepuasan');
    Route::post('permintaans/{permintaan}/kepuasan', [WorkOrderController::class, 'storeKepuasan'])->name('permintaans.kepuasan.update');
    Route::post('permintaans', [WorkOrderController::class, 'store'])->name('permintaans.store');
    Route::get('permintaans/{permintaan}', [WorkOrderController::class, 'show'])->name('permintaans.show');
    Route::get('permintaans/{workOrder}/edit', [WorkOrderController::class, 'edit'])->name('permintaans.edit');
    Route::get('permintaans/{permintaan}/promo', [WorkOrderController::class, 'perancangan'])->name('permintaans.perancangan');
    Route::put('permintaans/{workOrder}', [WorkOrderController::class, 'update'])->name('permintaans.update');
    Route::delete('permintaans/{workOrder}', [WorkOrderController::class, 'destroy'])->name('permintaans.destroy');
    Route::delete('permintaans/destroy', [WorkOrderController::class, 'massDestroy'])->name('permintaans.massDestroy');

    // Persetujuan Work Order
    Route::get('persetujuan-work-order', [WorkOrderEvaluationController::class, 'index'])->name('persetujuan-work-order.index');
    Route::get('persetujuan-work-order/create', [WorkOrderEvaluationController::class, 'create'])->name('persetujuan-work-order.create');
    Route::post('persetujuan-work-order', [WorkOrderEvaluationController::class, 'store'])->name('persetujuan-work-order.store');
    Route::get('persetujuan-work-order/{workOrderEvaluation}', [WorkOrderEvaluationController::class, 'show'])->name('persetujuan-work-order.show');
    Route::get('persetujuan-work-order/{workOrderEvaluation}/edit', [WorkOrderEvaluationController::class, 'edit'])->name('persetujuan-work-order.edit');
    Route::put('persetujuan-work-order/{workOrderEvaluation}', [WorkOrderEvaluationController::class, 'update'])->name('persetujuan-work-order.update');
    Route::put('persetujuan-work-order/{workOrderEvaluation}/setujui', [WorkOrderEvaluationController::class, 'setujui'])->name('persetujuan-work-order.setujui');
    Route::put('persetujuan-work-order/{workOrderEvaluation}/revisi', [WorkOrderEvaluationController::class, 'revisi'])->name('persetujuan-work-order.revisi');
    Route::delete('persetujuan-work-order/{workOrderEvaluation}', [WorkOrderEvaluationController::class, 'destroy'])->name('persetujuan-work-order.destroy');
    Route::delete('persetujuan-work-order/destroy', [WorkOrderEvaluationController::class, 'massDestroy'])->name('persetujuan-work-order.massDestroy');

    // Penugasan Teknisi
    Route::get('penugasan-teknisi', [WorkOrderAssigneeController::class, 'index'])->name('penugasan-teknisi.index');
    Route::get('penugasan-teknisi/create', [WorkOrderAssigneeController::class, 'create'])->name('penugasan-teknisi.create');
    Route::get('penugasan-teknisi/{workOrderAsignee}/kepuasan', [WorkOrderAssigneeController::class, 'kepuasan'])->name('penugasan-teknisi.kepuasan');
    Route::post('penugasan-teknisi/{workOrderAsignee}/kepuasan', [WorkOrderAssigneeController::class, 'storeKepuasan'])->name('penugasan-teknisi.kepuasan.update');
    Route::post('penugasan-teknisi', [WorkOrderAssigneeController::class, 'store'])->name('penugasan-teknisi.store');
    Route::get('penugasan-teknisi/{workOrderAsignee}', [WorkOrderAssigneeController::class, 'show'])->name('penugasan-teknisi.show');
    Route::get('penugasan-teknisi/{workOrderAssignee}/selesaikan', [WorkOrderAssigneeController::class, 'selesaikan'])->name('penugasan-teknisi.selesaikan');
    Route::put('penugasan-teknisi/{workOrderAssignee}/selesaikan', [WorkOrderAssigneeController::class, 'selesaikanUpdate'])->name('penugasan-teknisi.selesaikan.update');
    Route::get('penugasan-teknisi/{workOrderAssignee}/edit', [WorkOrderAssigneeController::class, 'edit'])->name('penugasan-teknisi.edit');
    Route::post('penugasan-teknisi/{workOrderAssignee}/mulai', [WorkOrderAssigneeController::class, 'mulai'])->name('penugasan-teknisi.mulai');
    Route::get('penugasan-teknisi/{workOrderAsignee}/promo', [WorkOrderAssigneeController::class, 'perancangan'])->name('penugasan-teknisi.perancangan');
    Route::put('penugasan-teknisi/{workOrderAssignee}', [WorkOrderAssigneeController::class, 'update'])->name('penugasan-teknisi.update');
    Route::delete('penugasan-teknisi/{workOrderAssignee}', [WorkOrderAssigneeController::class, 'destroy'])->name('penugasan-teknisi.destroy');
    Route::delete('penugasan-teknisi/destroy', [WorkOrderAssigneeController::class, 'massDestroy'])->name('penugasan-teknisi.massDestroy');

    // Laporan
    Route::get('laporans', [LaporanController::class, 'index'])->name('laporans.index');
    Route::post('laporans/{workOrder}/create-detail', [LaporanController::class, 'createDetail'])->name('laporans.create-detail');
    Route::post('laporans/create-list', [LaporanController::class, 'createList'])->name('laporans.create-list');
    Route::post('laporans', [LaporanController::class, 'store'])->name('laporans.store');
    Route::get('laporans/{laporan}', [LaporanController::class, 'show'])->name('laporans.show');
    Route::get('laporans/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporans.edit');
    Route::put('laporans/{laporan}', [LaporanController::class, 'update'])->name('laporans.update');
    Route::delete('laporans/{laporan}', [LaporanController::class, 'destroy'])->name('laporans.destroy');
    Route::delete('laporans/destroy', [LaporanController::class, 'massDestroy'])->name('laporans.massDestroy');

    Route::get('/test-email', function () {
        \Mail::raw('Ini email percobaan dari Laravel', function ($message) {
            $message->to('pratamayogie131@gmail.com')
                    ->subject('Test Email');
        });

    return 'Email terkirim!';
});

});

