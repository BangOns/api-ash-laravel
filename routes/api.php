<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliKelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Auth
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('/refresh-token', [App\Http\Controllers\AuthController::class, 'refreshToken'])->name('refresh.token')->middleware(['auth:sanctum', 'ability:issue_access_api']);
Route::middleware(['auth:sanctum', 'ability:admin,access_api'])->group(function () {
    //  jurusan
    Route::apiResource('jurusan', JurusanController::class);
    //wali_kelas
    Route::apiResource('wali-kelas', WaliKelasController::class);
    // kelas
    Route::apiResource('kelas', KelasController::class);
    // Pelajaran
    Route::apiResource('pelajaran', PelajaranController::class);
});
Route::middleware(['auth:sanctum', 'ability:guru,admin,access_api'])->group(function () {
    // jadwal
    Route::apiResource('jadwal', JadwalController::class);
    // Siswa
    Route::apiResource('siswa', SiswaController::class);
    // Nilai Siswa
    Route::apiResource('nilai-siswa', NilaiSiswaController::class);
    // Kehadiran
    Route::apiResource('kehadiran', KehadiranController::class);
});
