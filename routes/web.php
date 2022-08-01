<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Mapel', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas.index');
Route::post('/kelas/store', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/{id}/edit', [App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
Route::post('/kelas/update', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{id}/delete', [App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.destroy');

Route::get('/semester', [App\Http\Controllers\SemesterController::class, 'index'])->name('semester.index');
Route::post('/semester/store', [App\Http\Controllers\SemesterController::class, 'store'])->name('semester.store');
Route::get('/semester/{id}/edit', [App\Http\Controllers\SemesterController::class, 'edit'])->name('semester.edit');
Route::post('/semester/update', [App\Http\Controllers\SemesterController::class, 'update'])->name('semester.update');
Route::delete('/semester/{id}/delete', [App\Http\Controllers\SemesterController::class, 'destroy'])->name('semester.destroy');

Route::get('/tahun-ajaran', [App\Http\Controllers\ThajaranController::class, 'index'])->name('ajaran.index');
Route::post('/tahun-ajaran/store', [App\Http\Controllers\ThajaranController::class, 'store'])->name('ajaran.store');
Route::get('/tahun-ajaran/{id}/edit', [App\Http\Controllers\ThajaranController::class, 'edit'])->name('ajaran.edit');
Route::post('/tahun-ajaran/update', [App\Http\Controllers\ThajaranController::class, 'update'])->name('ajaran.update');
Route::delete('/tahun-ajaran/{id}/delete', [App\Http\Controllers\ThajaranController::class, 'destroy'])->name('ajaran.destroy');

Route::get('/mapel', [App\Http\Controllers\MapelController::class, 'index'])->name('mapel.index');
Route::post('/mapel/store', [App\Http\Controllers\MapelController::class, 'store'])->name('mapel.store');
Route::get('/mapel/{id}/edit', [App\Http\Controllers\MapelController::class, 'edit'])->name('mapel.edit');
Route::post('/mapel/update', [App\Http\Controllers\MapelController::class, 'update'])->name('mapel.update');
Route::delete('/mapel/{id}/delete', [App\Http\Controllers\MapelController::class, 'destroy'])->name('mapel.destroy');

Route::get('/jadwal', [App\Http\Controllers\MengajarController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/add', [App\Http\Controllers\MengajarController::class, 'create'])->name('jadwal.create');

Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/add', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
Route::post('/guru/store', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/{id}/edit', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
Route::post('/guru/{id}/update', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/{id}/delete', [App\Http\Controllers\GuruController::class, 'delete'])->name('guru.destroy');


Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/add', [App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}/edit', [App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/{id}/update', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}/delete', [App\Http\Controllers\SiswaController::class, 'delete'])->name('siswa.destroy');