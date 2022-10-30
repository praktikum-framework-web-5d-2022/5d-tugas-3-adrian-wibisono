<?php

use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Promise\Create;

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

Route::get('/',[DashboardController::class,'index'])->name('dashboard.index'); 

Route::get('/dosen', function () {
    return view('dosen.index');
});

Route::resource('dosen', DosenController::class);
Route::get('/dosen/{dosen}/delete', [DosenController::class, 'destroy'])->name('dosen.destroy');


Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
});
Route::resource('mahasiswa', MahasiswaController::class);


Route::get('/matakuliah', function () {
    return view('matakuliah.index');
});
Route::resource('matakuliah', MataKuliahController::class);



// menampilkan data =>index
// menampilkan form tambah => Create
// proses => store 
// menampilkan form edit => edit
// proses=>update
// hapus=> delete/destroy