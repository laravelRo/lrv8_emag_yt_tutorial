<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;

//rutele pentru paginile publice

Route::prefix('user/cpanel')->middleware(['verified', 'auth'])->group(function () {

    Route::get('/', [UserController::class, 'showSettings'])->name('settings');
    Route::get('/reset-pass', [UserController::class, 'showResetPass'])->name('reset-pass');
    Route::post('/reset-pass', [UserController::class, 'resetPass'])->name('change-pass');
});
