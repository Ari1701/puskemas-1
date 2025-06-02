<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardAntrianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\FrontAntrianController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\KontakController;

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
    return view('home');
});

Route::get('/dashboard/home', [HomeController::class, 'index'])->name('dashboard.home');
Route::post('/kontak', [KontakController::class, 'send'])->name('contact.send');
Route::resource('antrian', FrontAntrianController::class);
Route::get('livewire/antrian/cetakAntrian', [FrontAntrianController::class, 'cetakAntrian'])->name('cetakAntrian');
Route::resource('jadwal_dokter', JadwalDokterController::class);
Route::get('/jadwal', [JadwalDokterController::class, 'index'])->name('dashboard.jadwal.index');
Route::resource('users', UserController::class);
Route::get('/profil', [UserController::class, 'show'])->middleware('auth')->name('dashboard.profil.index');


Auth::routes();
Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'CheckRole:dokter'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('redirectifauthenticated');
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('dashboard/antrian/poliUmum', [DashboardAntrianController::class, 'indexPoliUmum']);
        Route::get('dashboard/antrian/poliGigi', [DashboardAntrianController::class, 'indexPoliGigi']);
        Route::get('dashboard/antrian/poliTht', [DashboardAntrianController::class, 'indexPoliTht']);
        Route::get('dashboard/antrian/poliLansia', [DashboardAntrianController::class, 'indexPoliLansia']);
        Route::get('dashboard/antrian/poliBalita', [DashboardAntrianController::class, 'indexPoliBalita']);
        Route::get('dashboard/antrian/poliKia', [DashboardAntrianController::class, 'indexPoliKia']);
        Route::get('dashboard/antrian/poliNifas', [DashboardAntrianController::class, 'indexPoliNifas']);
        Route::get('dashboard/laporan/index', [DashboardLaporanController::class, 'index']);
        Route::get('livewire/dashboard/laporan/cetakLaporan', [DashboardLaporanController::class, 'cetakLaporan'])->name('cetakLaporan');
    });
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'CheckRole:admin'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('redirectifauthenticated');
        Route::get('/admin', [AdminController::class, 'index']);
        Route::get('/admin/Daftarpengguna', [AdminController::class, 'daftarpengguna']);
        Route::get('/admin/editUser', [AdminController::class, 'editUser']);
        Route::put('/admin/updateUser', [AdminController::class, 'updateUser']);
        Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('/admin/jadwalDokter', [AdminController::class, 'showJadwal'])->name('jadwal.show');
        Route::get('/admin/create', [JadwalDokterController::class, 'create'])->name('jadwal.create');
        Route::post('/admin/store', [JadwalDokterController::class, 'store'])->name('jadwal.store');
        Route::get('/admin/edit/{id}', [JadwalDokterController::class, 'edit'])->name('jadwal.edit');
        Route::put('/admin/update/{id}', [JadwalDokterController::class, 'update'])->name('jadwal.update');
        Route::delete('/admin/destroy/{id}', [JadwalDokterController::class, 'destroy'])->name('jadwal.destroy');
        Route::get('/admin/antrian', [AdminController::class, 'antrian']);
        Route::put('/admin/antrian/call/{id}', [AdminController::class, 'call'])->name('antrian.call');
    });
});
