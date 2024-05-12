<?php

use App\Http\Controllers\admin\AdminContentController;
use App\Http\Controllers\admin\AdminEventController;
use App\Http\Controllers\admin\AdminJanjiTemuController;
use App\Http\Controllers\admin\AdminKategoryKekerasan;
use App\Http\Controllers\admin\AdminLaporanController;
use App\Http\Controllers\admin\AdminTemuJanjiController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\ProfileAdminController;
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
Route::get('/blog', [DashboardPublicController::class, 'blog'])->name('blog');
Route::get('/blog-detail', [DashboardPublicController::class, 'detailBlog'])->name('blog.detail');
Route::get('/contact', [DashboardPublicController::class, 'contact'])->name('contact');


Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/profile', [ProfileAdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/content', AdminContentController::class);
    Route::resource('/admin/category-violence', AdminKategoryKekerasan::class);
    Route::resource('/admin/event', AdminEventController::class);

    /*||============================================== K E L O L A L A P O R A N ============================================== ||*/
    Route::get('/admin/laporan', [AdminLaporanController::class, 'index'])->name('laporan.index');
    Route::get('/admin/laporan/{no_registrasi}', [AdminLaporanController::class, 'detail'])->name('laporan.detail');
    Route::get('/admin/laporan-diproses', [AdminLaporanController::class, 'diproses'])->name('laporan.diproses');
    Route::get('/admin/laporan-dibatalkan', [AdminLaporanController::class, 'dibatalkan'])->name('laporan.dibatalkan');

    /*||============================================== J A N J I T E M U ============================================== ||*/
    Route::get('/admin/janji-temu', [AdminJanjiTemuController::class, 'index'])->name('janji-temu.index');
    Route::get('/admin/janji-temu/disetujui', [AdminJanjiTemuController::class, 'disetujui'])->name('janji-temu.disetujui');
    Route::get('/admin/janji-temu/ditolak', [AdminJanjiTemuController::class, 'ditolak'])->name('janji-temu.ditolak');
    Route::get('/admin/janji-temu/dibatalkan', [AdminJanjiTemuController::class, 'dibatalkan'])->name('janji-temu.dibatalkan');
});
