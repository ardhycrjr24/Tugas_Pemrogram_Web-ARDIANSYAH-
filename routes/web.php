<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// ✅ Halaman HOME
Route::get('/', function () {
    return view('home');
})->name('home');

// ✅ Halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

// ✅ Halaman Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ✅ Halaman Product+Controller
Route::get('/product', [ProductController::class, 'index'])->name('product');

// ✅ Halaman keranjang belanja
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
