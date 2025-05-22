<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalController;

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

// Route::get('/', function () {
//     return redirect('/ruangan');
// }); //ini tuh yang buat buka halaman dibuat reirect biar bis amasuk ke view index tapi sekalian ngirim variabel ruangans

// Route::get('/', function () {
//     return view('halamanUtama');
// })->name('halamanUtama');
Route::get('/', [DasboardController::class, 'index'])->name('Dashboard.index');

Route::resource('Ruangan', RuanganController::class);
Route::resource('Mahasiswa', MahasiswaController::class);
Route::resource('Jadwal', JadwalController::class);



