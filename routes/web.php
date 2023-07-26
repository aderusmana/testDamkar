<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DynamicInputController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UserController;
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



Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('proseslogin');

Route::middleware(['auth', 'role:Pemimpin Kelompok'])->group(function () {
    // Tambahkan rute-rute pemimpin.kelompok di sini
    Route::get('/kelompok/dashboard', [UserController::class, 'dashboardKelompok'])->name('kelompok.dashboard');
    Route::get('/kelompok/submit-absensi', [AbsensiController::class, 'showSubmitForm'])->name('show.submit');
    Route::post('/kelompok/submit-absensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/check-absensi-today', [AbsensiController::class, 'checkAbsensiToday']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // anggota
    Route::get('/kelompok/anggota', [AnggotaController::class, 'index'])->name('index.anggota');
    Route::post('/kelompok/anggota', [AnggotaController::class, 'store'])->name('store.anggota');
    Route::put('/kelompok/anggota/{id}/update', [AnggotaController::class, 'update'])->name('update.anggota');
    Route::delete('/kelompok/anggota/{id}/delete', [AnggotaController::class, 'destroy'])->name('destroy.anggota');
    // jadwal
    Route::get('/kelompok/jadwal', [JadwalController::class, 'index'])->name('index.jadwal');
    Route::post('/kelompok/jadwal', [JadwalController::class, 'store'])->name('store.jadwal');
    Route::put('/kelompok/jadwal/{id}/update', [JadwalController::class, 'update'])->name('update.jadwal');
    Route::delete('/kelompok/jadwal/{id}/delete', [JadwalController::class, 'destroy'])->name('destroy.jadwal');
});


Route::middleware(['auth', 'role:Pemimpin Apel'])->group(function () {
    // Tambahkan rute-rute pemimpin.apel di sini
    Route::get('/apel/dashboard', [UserController::class, 'dashboardApel'])->name('apel.dashboard');
    Route::get('/apel/rekapitulasi', [AbsensiController::class, 'showRekapitulasi'])->name('rekapitulasi');
    Route::get('/apel/get-detail/{status}/{tanggal}', [AbsensiController::class, 'getDetail']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
