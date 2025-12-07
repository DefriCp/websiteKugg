<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman lain
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/produk', [HomeController::class, 'products'])->name('products');
Route::get('/pengajuan-kredit', [HomeController::class, 'pengajuan'])->name('pengajuan');

// Berita
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news}', [NewsController::class, 'show'])->name('news.show');

// Form contact / pengaduan / kritik & saran
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');
