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

Route::view('/', 'index')->name('beranda');

Route::view('/tentang', 'tentang.tentang')->name('tentang');
Route::view('/struktur', 'tentang.struktur')->name('struktur');


Route::view('/info-tbc', 'info_tbc.info_tbc')->name('infotbc');
// Route::view('/info-tbc/{info-tbc}', 'infotbc.infotbc_single');

Route::view('/kasus-tbc', 'kasustbc.kasustbc')->name('kasustbc');

Route::view('/artikel', 'artikel.artikel')->name('artikel');
Route::view('/artikel/1', 'artikel.single_artikel');

Route::view('/kegiatan', 'kegiatan.kegiatan')->name('kegiatan');

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin', 'admin.dashboard')->name('dashboard');

Route::view('/admin/artikel', 'admin.admin_artikel.index');
Route::view('/admin/artikel/1', 'admin.admin_artikel.show');
Route::view('/admin/artikel/create', 'admin.admin_artikel.create');
