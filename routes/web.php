<?php

use App\Http\Controllers\admin\AdminContentController;
use App\Http\Controllers\admin\AdminEventController;
use App\Http\Controllers\admin\AdminKategoryKekerasan;
use App\Http\Controllers\admin\AdminLaporanController;
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
    Route::resource('/admin/laporan', AdminLaporanController::class);
    Route::resource('/admin/content', AdminContentController::class);
    Route::resource('/admin/category-violence', AdminKategoryKekerasan::class);
    Route::resource('/admin/event', AdminEventController::class);
});
