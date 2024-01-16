<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/view', [AdminController::class, 'view']);

Route::middleware(['guest'])->group(function(){ 
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);

});

Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/leader', [AdminController::class, 'lead'])->middleware('userAkses:lead');
    Route::get('/admin/staf', [AdminController::class, 'staf'])->middleware('userAkses:staf')->name('halamanStaf');
    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/admin/lead/belum',[ReportController::class, 'belum']);
    // Staf
    Route::get('/admin/staf/buatLaporan',[ReportController::class, 'create'])->middleware('userAkses:staf');
    Route::post('/admin/staf/kirim', [ReportController::class, 'store'])->middleware('userAkses:staf')->name('admin.staf.kirim');
    Route::get('/admin/staf/update/{id}',[ReportController::class, 'view_update'])->middleware('userAkses:staf');
    Route::put('/admin/staf/{id}/update/',[ReportController::class, 'update_store'])->middleware('userAkses:staf');
    Route::delete('/admin/staf/hapus/{id}',[ReportController::class, 'delete_laporan'])->middleware('userAkses:staf')->name('reports.delete');
    Route::get('/admin/staf/lihat/{id}',[ReportController::class, 'detail_laporan'])->middleware('userAkses:staf')->name('reports.detail');
    // Lead
    Route::get('/admin/leader/terima/{id}', [AdminController::class, 'terimaStatus'])->name('reportstaf.status-terima');
    Route::get('/admin/leader/tolak/{id}', [AdminController::class, 'deleteStatus'])->name('reportstaf.status-tolak');
    Route::get('/admin/lead/lihat/{id}',[ReportController::class, 'detail_laporan_lead'])->middleware('userAkses:lead')->name('reports.detail_lead');
    
});
