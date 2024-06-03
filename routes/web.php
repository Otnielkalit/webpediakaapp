<?php

use App\Http\Controllers\admin\AdminContentController;
use App\Http\Controllers\admin\AdminEventController;
use App\Http\Controllers\admin\AdminJanjiTemuController;
use App\Http\Controllers\admin\AdminKategoryKekerasan;
use App\Http\Controllers\admin\AdminKorbanController;
use App\Http\Controllers\admin\AdminLaporanController;
use App\Http\Controllers\admin\AdminPelakuController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\ProfileAdminController;
use App\Http\Controllers\admin\TrackingLaporanController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\public\DashboardPublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('user/login', [AuthController::class, 'userLogin'])->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/', [DashboardPublicController::class, 'welcome'])->name('welcome');
Route::get('/feature', [DashboardPublicController::class, 'feature'])->name('feature');
Route::get('/content', [DashboardPublicController::class, 'content'])->name('content');
Route::get('/content-detail/{id}', [DashboardPublicController::class, 'detailContent'])->name('content.detail');
Route::get('/content/searchByCategory', [DashboardPublicController::class, 'searchByCategory'])->name('content.searchByCategory');
Route::get('/content/search', [DashboardPublicController::class, 'search'])->name('content.search');
Route::get('/search/category/{category_name}', [DashboardPublicController::class, 'searchByCategory'])->name('content.searchByCategory');




Route::get('/event', [DashboardPublicController::class, 'event'])->name('event');
Route::get('/event-detail/{id}', [DashboardPublicController::class, 'eventDetail'])->name('event.detail');
Route::get('/contact', [DashboardPublicController::class, 'contact'])->name('contact');


Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/profile', [ProfileAdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/content', AdminContentController::class);
    Route::resource('/admin/category-violence', AdminKategoryKekerasan::class);
    Route::resource('/admin/event', AdminEventController::class);
    Route::put('/admin/edit-contact', [DashboardAdminController::class, 'updateContact'])->name('contact.update');



    /*||============================================== K E L O L A L A P O R A N ============================================== ||*/
    Route::get('/admin/laporan-masuk', [AdminLaporanController::class, 'masuk'])->name('laporan.masuk');
    Route::get('admin/laporan-masuk-detail/{no_registrasi}', [AdminLaporanController::class, 'masukDetail'])->name('laporan.masuk-detail');

    Route::put('/admin/proses-laporan/{no_registrasi}', [AdminLaporanController::class, 'proses'])->name('laporan.proses');
    Route::get('/admin/laporan-diproses', [AdminLaporanController::class, 'diproses'])->name('laporan.diproses');
    Route::get('/admin/detail-laporan-diproses/{no_registrasi}', [AdminLaporanController::class, 'detailDiProses'])->name('laporan.detail-diproses');

    Route::post('/admin/create-korban', [AdminKorbanController::class, 'store'])->name('korban.store');
    Route::delete('/admin/delete-korban-kekerasan/{id}', [AdminKorbanController::class, 'destroy'])->name('korban.destroy');

    Route::post('/admin/create-pelaku-kekerasan', [AdminPelakuController::class, 'store'])->name('pelaku.store');
    Route::put('/admin/edit-pelaku-kekerasan', [AdminPelakuController::class, 'update'])->name('pelaku.update');
    Route::delete('/admin/delete-pelaku-kekerasan/{id}', [AdminPelakuController::class, 'destroy'])->name('pelaku.destroy');


    Route::put('admin/lihat-laporan/{no_registrasi}', [AdminLaporanController::class, 'lihat'])->name('laporan.lihat');
    Route::get('/admin/laporan-dilihat', [AdminLaporanController::class, 'dilihat'])->name('laporan.dilihat');
    Route::get('/admin/detail-laporan-dilihat/{no_registrasi}', [AdminLaporanController::class, 'detailDilihat'])->name('laporan.detail-dilihat');


    Route::get('/admin/laporan-dibatalkan', [AdminLaporanController::class, 'dibatalkan'])->name('laporan.dibatalkan');
    Route::get('/admin/detail-laporan-dibatalkan/{no_registrasi}', [AdminLaporanController::class, 'detailDibatalkan'])->name('laporan.detail-dibatalkan');

    Route::put('admin/selesaikan-laporan/{no_registrasi}', [AdminLaporanController::class, 'selesaikanLaporan'])->name('laporan.selesaikan');
    Route::get('/admin/laporan-selesai', [AdminLaporanController::class, 'selesai'])->name('laporan.selesai');
    Route::get('/admin/detail-laporan-selesai/{no_registrasi}', [AdminLaporanController::class, 'detailSelesai'])->name('laporan.detail-selesai');

    /*||============================================== K E L O L A T R A C K I N G L A P O R A N ============================================== ||*/
    Route::post('/admin/store-tracking', [TrackingLaporanController::class, 'store'])->name('tracking.store');


    /*||============================================== J A N J I T E M U ============================================== ||*/
    Route::get('/admin/janji-temu', [AdminJanjiTemuController::class, 'index'])->name('janji-temu.index');
    Route::get('/admin/detail-janji-temu/{id}', [AdminJanjiTemuController::class, 'detailJanjiTemu'])->name('janji-temu.detail');
    Route::put('/admin/setujui-janji-temu/{id}', [AdminJanjiTemuController::class, 'setujui'])->name('janji-temu.setujui');
    Route::put('/admin/tolak-janji-temu/{id}', [AdminJanjiTemuController::class, 'tolak'])->name('janji-temu.tolak');

    Route::get('/admin/janji-temu/disetujui', [AdminJanjiTemuController::class, 'disetujui'])->name('janji-temu.disetujui');
    Route::get('/admin/detail-janji-temu/disetujui/{id}', [AdminJanjiTemuController::class, 'detailDisetujui'])->name('janji-temu.detail-disetujui');

    Route::get('/admin/janji-temu/ditolak', [AdminJanjiTemuController::class, 'ditolak'])->name('janji-temu.ditolak');
    Route::get('/admin/detail-janji-temu/ditolak/{id}', [AdminJanjiTemuController::class, 'detailDitolak'])->name('janji-temu.detail-ditolak');

    Route::get('/admin/janji-temu/dibatalkan', [AdminJanjiTemuController::class, 'dibatalkan'])->name('janji-temu.dibatalkan');
    Route::get('/admin/detailjanji-temu/dibatalkan{id}', [AdminJanjiTemuController::class, 'detailDibatalkan'])->name('janji-temu.detail-dibatalkan');
});
