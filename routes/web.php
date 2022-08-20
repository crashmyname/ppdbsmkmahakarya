<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AdminController;

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

Route::get('/info', [DataController::class,'info']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/form', [DashboardController::class, 'form'])->middleware('auth');
Route::get('/form_pembayaran', [DashboardController::class, 'form_pembayaran'])->middleware('auth');
Route::get('/faq', [DashboardController::class, 'faq'])->middleware('auth');
Route::get('/bayar', [DashboardController::class, 'bayar'])->middleware('auth');
Route::post('/bayar', [DashboardController::class, 'bayar'])->middleware('auth');
Route::post('/pesan', [DashboardController::class, 'pesan'])->middleware('auth');
Route::post('/form', [DataController::class, 'insertform'])->middleware('auth');
Route::get('/uprofil/{id}', [DashboardController::class, 'formupprofil'])->middleware('auth');
Route::post('/uprofil/{id}', [DashboardController::class, 'upprofil'])->middleware('auth');
Route::get('/hasil',[DashboardController::class, 'hasil']);


// Route::middleware(['ceklevel:admin'])->group(function () {
//     // Route::post('/admin', function () {
//     //     return view('admindashboard');
//     // })->name('loginadmin');
//     Route::post('/admin', [AdminController::class, 'loginadmin']);
    
// });

// Route Untuk Para Admin 

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'loginadmin']);
// Route::get('/admlogout', [AdminController::class, 'logoutadmin']);
Route::middleware(['auth', 'ceklevel'])->group(function () {
    Route::get('/admindashboard', [AdminController::class, 'dashboard']);
    Route::get('/datasiswa', [AdminController::class, 'datasiswa']);
    Route::get('/dataortu', [AdminController::class, 'dataortu']);
    Route::get('/datapendidikan', [AdminController::class, 'datapendidikan']);
    Route::get('/datapesan', [AdminController::class, 'datapesan']);
    Route::get('/datapembayaran', [AdminController::class, 'datapembayaran']);
    Route::delete('/delpembayaran/{id_bayar}', [AdminController::class, 'delpembayaran']);
    Route::get('/datauser', [AdminController::class, 'datauser']);
    Route::get('/tampiluser/{id_siswa}', [AdminController::class, 'show']);
    Route::delete('/deletedata/{id_siswa}', [AdminController::class, 'destroy']);
    Route::get('/tampildata/{id_siswa}', [AdminController::class, 'update']);
    Route::put('/updated/{id_siswa}', [AdminController::class, 'updated']);
    Route::get('/datajurusan',[AdminController::class, 'datajurusan']);
    Route::get('/formjurusan',[AdminController::class, 'formjurusan']);
    Route::post('/addjurusan',[AdminController::class, 'addjurusan']);
    Route::get('/fejurusan/{id}',[AdminController::class, 'formeditjurusan']);
    Route::put('/ejurusan/{id}',[AdminController::class, 'editjurusan']);
    Route::delete('/deletejurusan/{id}',[AdminController::class, 'deljurusan']);
    Route::get('/laporan',[AdminController::class, 'vlaporan']);
    Route::get('/tampildetail/{nama_sekolah}',[AdminController::class, 'dlaporan']);
    Route::get('/tampildetails/{jurusan}',[AdminController::class, 'djlaporan']);
    Route::post('/admlogout', [AdminController::class, 'logoutadmin']);
});
