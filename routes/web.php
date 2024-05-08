<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BbmConreoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\NotifPiutangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth');
});
Route::get('home', [HomeController::class, 'index'])->name('home.dashboard')->middleware('auth');

//auth
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('login', [AuthController::class, 'authenticate'])->name('proseslogin');

//pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('index.pegawai')->middleware('auth');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('create.pegawai')->middleware('auth');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store')->middleware('auth');
Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit')->middleware('auth');
Route::patch('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update')->middleware('auth');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.delete')->middleware('auth');

//users
Route::get('user', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::post('getPegawai', [UserController::class, 'getPegawai'])->name('user.getPegawai')->middleware('auth');
Route::get('user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('user', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.delete')->middleware('auth');

//Kendaraan
Route::get('kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index')->middleware('auth');
Route::get('kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create')->middleware('auth');
Route::post('kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store')->middleware('auth');
Route::get('kendaraan/{id}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit')->middleware('auth');
Route::patch('kendaraan/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update')->middleware('auth');
Route::delete('kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.delete')->middleware('auth');

//bbm
Route::get('bbm', [BbmConreoller::class, 'index'])->name('bbm.index')->middleware('auth');

//notif piutang
Route::get('notifPiutang/index', [NotifPiutangController::class, 'index'])->name('notif_piutang.index')->middleware('auth');
Route::post('notifPiutang/importExcel', [NotifPiutangController::class, 'import_excel'])->name('notif_piutang.import_excel')->middleware('auth');
Route::get('notifPiutang/send/{id}', [NotifPiutangController::class, 'sendMessage'])->name('notif_piutang.send')->middleware('auth');
