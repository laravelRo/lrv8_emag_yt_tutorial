<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;

//rutele pentru paginile publice

Route::prefix('user/cpanel')->middleware(['verified', 'auth'])->group(function () {

    Route::get('/', [UserController::class, 'showSettings'])->name('settings');

    // =============================
    //rutele pentru schimbarea parolei
    // =============================

    Route::get('/reset-pass', [UserController::class, 'showResetPass'])->name('reset-pass');
    Route::post('/reset-pass', [UserController::class, 'resetPass'])->name('change-pass');

    // =============================
    //rutele pentru setarea adreselor
    // =============================

    //listarea adreselor
    Route::get('address', [UserController::class, 'showAddress'])->name('address.show');
    //afisarea formularului pentru adaugarea unei adrese
    Route::get('address/add', [UserController::class, 'addAddress'])->name('address.add');
    //adaugam o noua adresa
    Route::post('address/create', [UserController::class, 'createAddress'])->name('address.create');

    //========================
    //rutele pentru editarea unei adrese
    //========================

    //afisarea formualrului pentru editarea adresei
    Route::get('address/edit/{id}', [UserController::class, 'editAddress'])->name('address.edit');
    //ruta pentru updatarea datelor adreseri
    Route::put('address/update/{id}', [UserController::class, 'updateAddress'])->name('address.update');

    //ruta pentru stergerea unei adrese
    Route::delete('address/delete/{id}', [UserController::class, 'deleteAddress'])->name('address.delete');
});
