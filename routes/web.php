<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FenderController;
use App\Http\Controllers\BollardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EquiptController;
use App\Http\Controllers\ToolsCategoryController;

// Route::get('/', function () {  
//     return view('welcome');
// });


Route::get('/', [PageController::class, 'home'])->name('page-home1');
Route::get('/page2/{category_id}/{gallery_id}', [PageController::class, 'home2'])->name('page-home2');
Route::get('/page3/{category_id}/{gallery_id}', [PageController::class, 'home3'])->name('page-home3');
Route::get('/category/{categoryId}', [PageController::class, 'showCategoryData'])->name('category.show');
Route::get('/get-galleries-by-category/{categoryId}', [PageController::class, 'getGalleriesByCategory']);


// Route group untuk halaman admin dengan prefix 'admin' dan nama 'admin.'
Route::prefix('admin')->name('admin.')->group(function () {

    // Route untuk login, register, dan forgot password, hanya untuk user yang belum login
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');

        Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('forgotPassword');
        Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('forgotPassword.send');

        Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
    });

    // Route untuk verifikasi email dan logout, hanya untuk user yang sudah login
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Route untuk halaman utama regional (Daftar regional)
        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        // Route untuk galeri berdasarkan regional
        Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

        // Route facility
        Route::get('/facility', [FacilityController::class, 'index'])->name('facility.index');
        Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility.create');
        Route::post('/facility', [FacilityController::class, 'store'])->name('facility.store');
        Route::get('/facility/{id}', [FacilityController::class, 'show'])->name('facility.show');
        Route::get('/facility/{id}/edit', [FacilityController::class, 'edit'])->name('facility.edit');
        Route::put('/facility/{id}', [FacilityController::class, 'update'])->name('facility.update');
        Route::delete('/facility/{id}', [FacilityController::class, 'destroy'])->name('facility.destroy');
        // Route untuk mengakses galeri berdasarkan kategori
        Route::get('/galleries/{category_id}', [FacilityController::class, 'getGalleriesByCategory'])->name('galleries.byCategory');

        // Route Fender
        Route::get('fender', [FenderController::class, 'index'])->name('fender.index');
        Route::get('fender/create', [FenderController::class, 'create'])->name('fender.create');
        Route::post('/fender', [FenderController::class, 'store'])->name('fender.store');
        Route::get('/fender/{id}', [FenderController::class, 'show'])->name('fender.show');
        Route::get('/fender/{id}/edit', [FenderController::class, 'edit'])->name('fender.edit');
        Route::put('/fender/{id}/update', [FenderController::class, 'update'])->name('fender.update');
        Route::delete('/fender/{id}', [FenderController::class, 'destroy'])->name('fender.destroy');
        Route::get('/galleries/{category_id}', [FenderController::class, 'getGalleriesByCategory'])->name('galleries.byCategory');

        // Route Bollard
        Route::get('bollard', [BollardController::class, 'index'])->name('bollard.index');
        Route::get('bollard/create', [BollardController::class, 'create'])->name('bollard.create');
        Route::post('bollard', [BollardController::class, 'store'])->name('bollard.store');
        Route::get('/bollard/{id}/', [BollardController::class, 'show'])->name('bollard.show');
        Route::get('bollard/{id}/edit', [BollardController::class, 'edit'])->name('bollard.edit');
        Route::put('bollard/{id}', [BollardController::class, 'update'])->name('bollard.update');
        Route::delete('bollard/{id}', [BollardController::class, 'destroy'])->name('bollard.destroy');
        Route::get('/galleries/{category_id}', [BollardController::class, 'getGalleriesByCategory'])->name('galleries.byCategory');

        // Settings
        Route::get('tools-category', [ToolsCategoryController::class, 'index'])->name('tools.index');
        Route::get('tools-category/create', [ToolsCategoryController::class, 'create'])->name('tools.create');
        Route::post('tools-category', [ToolsCategoryController::class, 'store'])->name('tools.store');
        Route::get('tools-category/{id}/edit', [ToolsCategoryController::class, 'edit'])->name('tools.edit');
        Route::put('tools-category/{id}', [ToolsCategoryController::class, 'update'])->name('tools.update');
        Route::delete('tools-category/{id}', [ToolsCategoryController::class, 'destroy'])->name('tools.destroy');

        // Route Equipment
        Route::get('equipt', [EquiptController::class, 'index'])->name('equipt.index');
        Route::get('equipt/create', [EquiptController::class, 'create'])->name('equipt.create');
    });
});
