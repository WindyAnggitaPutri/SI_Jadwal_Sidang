<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
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

Route::get('/', function () {
    return redirect('/ruangan');
}); //ini tuh yang buat buka halaman dibuat reirect biar bis amasuk ke view index tapi sekalian ngirim variabel ruangans

Route::get('/ruangan', [RuanganController::class, 'index']);


Route::get('/ruangan/tambahRuangan', [RuanganController::class, 'create']); // menampilkan form
Route::post('/ruangan', [RuanganController::class, 'store']); // proses form POST

Route::get('/ruangan/editRuangan/{id}', [RuanganController::class, 'edit'])->name('ruangan.editRuangan');
Route::put('/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');

// Hapus ruangan
Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy']);