<?php

use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\dataKeluargaController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\DataInformasiController;
use App\Http\Controllers\DataRTController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndoRegionController;
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

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.action');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout.action')->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.action');

Route::get('/', [LandingPageController::class, 'index']);

// Route::get('/dashboard', [DashboardController::class, 'showNav'])->name('dashboard.showNav');

// Route untuk menampilkan chart
Route::get('/dashboard', [DashboardController::class, 'chart'])->name('dashboard.chart')->middleware('auth');

// Dashboard Warga
Route::get('/dashboard-warga', [DataWargaController::class, 'index'])->middleware('auth');
Route::post('/dashboard-warga', [DataWargaController::class, 'store'])->middleware('auth');
Route::get('/dashboard-warga-add', [DataWargaController::class, 'create'])->middleware('auth');
Route::post('/dashboard-warga-add', [DataWargaController::class, 'store'])->middleware('auth');

Route::get('/dashboard-warga-edit/edit/{id}', [DataWargaController::class, 'edit'])->middleware('auth');
Route::put('/dashboard-warga-edit/{id}', [DataWargaController::class, 'update'])->middleware('auth');
Route::delete('/dashboard-warga-delete/{id}', [DataWargaController::class, 'destroy'])->middleware('auth');
Route::post('/dashboard-warga/import',[DataWargaController::class, 'import'])->middleware('auth')->name('import');

// Dashboard Kartu Keluarga
Route::GET('/dashboard-data-keluarga',[dataKeluargaController::class,'index'])->middleware('auth');
Route::GET('/dashboard-data-keluarga-add',[dataKeluargaController::class,'create'])->middleware('auth');
Route::POST('/dashboard-data-keluarga-add',[dataKeluargaController::class,'store'])->middleware('auth');
Route::GET('/dashboard-data-keluarga-edit/edit/{id}',[dataKeluargaController::class,'edit'])->middleware('auth');
Route::PUT('/dashboard-data-keluarga-edit/{id}',[dataKeluargaController::class,'update'])->middleware('auth');
Route::delete('/dashboard-data-keluarga-delete/{id}', [dataKeluargaController::class,'destroy'])->middleware('auth');

// Dashboard Mutasi
Route::get('/dashboard-mutasi', [MutasiController::class, 'index'])->middleware('auth');
Route::get('/dashboard-mutasi-add', [MutasiController::class, 'create'])->middleware('auth');
Route::post('/dashboard-mutasi-add', [MutasiController::class, 'store'])->middleware('auth');

Route::get('/dashboard-mutasi-edit/edit/{id}', [MutasiController::class, 'edit'])->middleware('auth');
Route::put('/dashboard-mutasi-edit/{id}', [MutasiController::class, 'update'])->middleware('auth');
Route::delete('/dashboard-mutasi-delete/{id}', [MutasiController::class, 'destroy'])->middleware('auth');

// Dashboard Informasi
Route::get('/dashboard-informasi', [DataInformasiController::class, 'index'])->middleware('auth');
Route::post('/dashboard-informasi', [DataInformasiController::class, 'store'])->middleware('auth');

Route::get('/dashboard-informasi-add', [DataInformasiController::class, 'create'])->middleware('auth');
Route::post('/dashboard-informasi-add', [DataInformasiController::class, 'store'])->middleware('auth');

Route::get('/dashboard-informasi-edit/edit/{id}', [DataInformasiController::class, 'edit'])->middleware('auth');
Route::put('/dashboard-informasi-edit/{id}', [DataInformasiController::class, 'update'])->middleware('auth');
Route::delete('/dashboard-informasi-delete/{id}', [DataInformasiController::class, 'destroy'])->middleware('auth');

//RT
Route::GET('/dashboard-data-rt',[DataRTController::class,'index'])->middleware('auth');
Route::POST('/dashboard-data-rt',[DataRTController::class,'store'])->middleware('auth');

Route::GET('/dashboard-data-rt-add',[DataRTController::class,'create'])->middleware('auth');
Route::POST('/dashboard-data-rt-add',[DataRTController::class,'store'])->middleware('auth');

Route::GET('/dashboard-data-rt-edit/edit/{id}',[DataRTController::class,'edit'])->middleware('auth');
Route::PUT('/dashboard-data-rt-edit/{id}',[DataRTController::class,'update'])->middleware('auth');
Route::DELETE('/dashboard-data-rt-delete/{id}',[DataRTController::class,'destroy'])->middleware('auth');

//DATA ADMIN
Route::get('/dashboard-admin', [AdminController::class, 'index'])->middleware('auth');
Route::post('/dashboard-admin', [AdminController::class, 'store'])->middleware('auth');
// Route::get('/dashboard-admin-add', [AdminController::class, 'create'])->middleware('auth');
// Route::post('/dashboard-admin-add', [AdminController::class, 'store'])->middleware('auth');
Route::get('/dashboard/{id}', [AdminController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/{id}', [AdminController::class, 'update'])->middleware('auth');

//Data Region
Route::get('/dashboard-warga-add', [IndoRegionController::class, 'formWarga'])->name('form')->middleware('auth');
Route::get('/dashboard-data-keluarga-add', [IndoRegionController::class, 'formKeluarga'])->name('form')->middleware('auth');
Route::get('/dashboard-mutasi-add', [IndoRegionController::class, 'formMutasi'])->name('form')->middleware('auth');


Route::post('/getKabupaten', [IndoRegionController::class, 'getKabupaten'])->name('getKabupaten')->middleware('auth');
Route::post('/getKecamatan', [IndoRegionController::class, 'getKecamatan'])->name('getKecamatan')->middleware('auth');
Route::post('/getDesa', [IndoRegionController::class, 'getDesa'])->name('getDesa')->middleware('auth');

Route::get('/getKabupaten', [IndoRegionController::class, 'getKabupaten'])->name('getKabupaten')->middleware('auth');
Route::get('/getKecamatan', [IndoRegionController::class, 'getKecamatan'])->name('getKecamatan')->middleware('auth');
Route::get('/getDesa', [IndoRegionController::class, 'getDesa'])->name('getDesa')->middleware('auth');
