<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MitraController;
use Illuminate\Support\Facades\Route;

// ================== BERANDA & HALAMAN STATIS ==================

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman lain
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');

// List produk
Route::get('/produk', [HomeController::class, 'products'])->name('products');

// Detail produk (pakai ID / route model binding)
Route::get('/produk/{product}', [HomeController::class, 'productShow'])->name('product.show');

// Pengajuan kredit
Route::get('/pengajuan-kredit', [HomeController::class, 'pengajuan'])->name('pengajuan');

// Titik Layanan (static view)
Route::view('/titik-layanan', 'frontend.titik-layanan')->name('titik-layanan');

// ================== MITRA ==================
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra');

// ================== BERITA ==================
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news}', [NewsController::class, 'show'])->name('news.show');

// ================== FORM KONTAK ==================
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');
