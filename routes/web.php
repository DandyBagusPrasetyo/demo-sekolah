<?php

use App\Http\Controllers\Admin\AdminAdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminSiswaController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Siswa\SiswaDashboardController;
use App\Http\Controllers\Siswa\SiswaKelasController;
use App\Http\Controllers\Siswa\SiswaProfileController;
use App\Models\Post;
use App\Models\Slider;
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
    $sliders = Slider::get();
    $blogs = Post::get();
    return view('home', compact('sliders', 'blogs'));
});

Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'isAdmin'], function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::get('/kelas', [AdminKelasController::class, 'index'])->name('admin.kelas.index');
        Route::get('/kelas/create', [AdminKelasController::class, 'create'])->name('admin.kelas.create');
        Route::post('/kelas/store', [AdminKelasController::class, 'store'])->name('admin.kelas.store');
        Route::get('/kelas/show/{id}', [AdminKelasController::class, 'show'])->name('admin.kelas.show');
        Route::get('/kelas/edit/{id}', [AdminKelasController::class, 'edit'])->name('admin.kelas.edit');
        Route::put('/kelas/update/{id}', [AdminKelasController::class, 'update'])->name('admin.kelas.update');
        Route::delete('/kelas/delete/{id}', [AdminKelasController::class, 'destroy'])->name('admin.kelas.delete');

        Route::get('/siswa', [AdminSiswaController::class, 'index'])->name('admin.siswa.index');
        Route::get('/siswa/create', [AdminSiswaController::class, 'create'])->name('admin.siswa.create');
        Route::post('/siswa/store', [AdminSiswaController::class, 'store'])->name('admin.siswa.store');
        Route::get('/siswa/show/{id}', [AdminSiswaController::class, 'show'])->name('admin.siswa.show');
        Route::get('/siswa/edit/{id}', [AdminSiswaController::class, 'edit'])->name('admin.siswa.edit');
        Route::put('/siswa/update/{siswa}', [AdminSiswaController::class, 'update'])->name('admin.siswa.update');
        Route::delete('/siswa/delete/{id}', [AdminSiswaController::class, 'destroy'])->name('admin.siswa.delete');

        Route::get('/admin', [AdminAdminController::class, 'index'])->name('admin.admin.index');
        Route::get('/admin/edit/{id}', [AdminAdminController::class, 'edit'])->name('admin.admin.edit');
        Route::put('/admin/update/{id}', [AdminAdminController::class, 'update'])->name('admin.admin.update');
        Route::delete('/admin/delete/{id}', [AdminAdminController::class, 'destroy'])->name('admin.admin.delete');

        Route::get('/slider', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
        Route::delete('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('admin.slider.delete');

        Route::get('/post', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/post/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/post/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('/post/update/{post}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/post/delete/{id}', [PostController::class, 'destroy'])->name('admin.post.delete');
    });
});

Route::prefix('siswa')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard.index');
        Route::get('/kelas', [SiswaKelasController::class, 'index'])->name('siswa.kelas.index');
        Route::get('/kelas/show/{id}', [SiswaKelasController::class, 'show'])->name('siswa.kelas.show');

        Route::get('/profile', [SiswaProfileController::class, 'index'])->name('siswa.profile.index');
        Route::get('/profile/edit', [SiswaProfileController::class, 'edit'])->name('siswa.profile.edit');
        Route::put('/profile/update/{siswa}', [SiswaProfileController::class, 'update'])->name('siswa.profile.update');
    });
});
