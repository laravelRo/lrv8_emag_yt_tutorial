<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PagesController;

//rutele pentru paginile publice
Route::get('/', [PagesController::class, 'homePage'])->name('home');
Route::get('/shop', [PagesController::class, 'shopPage'])->name('shop');
Route::get('/product', [PagesController::class, 'productPage'])->name('product');
Route::get('/contact', [PagesController::class, 'contactPage'])->name('contact');
Route::get('/cart', [PagesController::class, 'cartPage'])->name('cart');
Route::get('/check', [PagesController::class, 'checkPage'])->name('check');
