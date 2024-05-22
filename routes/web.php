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
    return view('bokoin.content.landingPage');
})->name('landingPage');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('content.dashboard');
})->name('dashboard')->middleware('auth');  

Route::get('/dashboard-warga-add', function () {
    return view('content.dashboard-warga-add');
})->name('dashboard-warga-add')->middleware('auth');

Route::get('/dashboard-kartu-keluarga-add', function () {
    return view('content.dashboard-kartu-keluarga-add');
})->name('dashboard-kartu-keluarga-add')->middleware('auth');

Route::get('/dashboard-mutasi-add', function () {
    return view('content.dashboard-mutasi-add');
})->name('dashboard-mutasi-add')->middleware('auth');

Route::get('/dashboard-informasi-add', function () {
    return view('content.dashboard-informasi-add');
})->name('dashboard-informasi-add')->middleware('auth'); 

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.action');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout.action')->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.action');

Route::get('/', [LandingPageController::class, 'index']);



// Dashboard Warga
Route::get('/dashboard-warga', [DataWargaController::class, 'index'])->middleware('auth');
Route::post('/dashboard-warga', [DataWargaController::class, 'store'])->middleware('auth');
Route::get('/dashboard-warga-add', [DataWargaController::class, 'create'])->middleware('auth');
Route::post('/dashboard-warga-add', [DataWargaController::class, 'store'])->middleware('auth');

Route::get('/dashboard-warga-edit/edit/{id}', [DataWargaController::class, 'edit'])->middleware('auth');
Route::put('/dashboard-warga-edit/{id}', [DataWargaController::class, 'update'])->middleware('auth');
Route::delete('/dashboard-warga-delete/{id}', [DataWargaController::class, 'destroy'])->middleware('auth');

// Dashboard Kartu Keluarga
Route::GET('/dashboard-data-keluarga',[dataKeluargaController::class,'index'])->middleware('auth');
Route::GET('/dashboard-data-keluarga-add',[dataKeluargaController::class,'create'])->middleware('auth');
Route::POST('/dashboard-data-keluarga-add',[dataKeluargaController::class,'store'])->middleware('auth');
Route::GET('/dashboard-data-keluarga-edit/edit/{id}',[dataKeluargaController::class,'edit'])->middleware('auth');
Route::PUT('/dashboard-data-keluarga-edit/{id}',[dataKeluargaController::class,'update'])->middleware('auth');
Route::delete('dashboard-delete-produk/{id}', [dataKeluargaController::class,'destroy'])->middleware('auth');

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
Route::get('/dashboard-admin-add', [AdminController::class, 'create'])->middleware('auth');
Route::post('/dashboard-admin-add', [AdminController::class, 'store'])->middleware('auth');
Route::get('/dashboard-admin-edit/edit/{id}', [AdminController::class, 'edit'])->middleware('auth');
Route::put('/dashboard-admin-edit/{id}', [AdminController::class, 'update'])->middleware('auth');