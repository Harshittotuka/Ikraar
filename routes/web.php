<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.home'))->name('home');
Route::get('/shop', fn() => view('pages.shop'))->name('shop');
Route::get('/product/{slug?}', fn() => view('pages.product'))->name('product');
Route::get('/collections', fn() => view('pages.collections'))->name('collections');
Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/cart', fn() => view('pages.cart'))->name('cart');
