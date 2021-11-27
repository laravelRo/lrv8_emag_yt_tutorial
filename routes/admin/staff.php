<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\PersonalController;
use Illuminate\Support\Facades\Route;

//rutele pentru autentificarea membrilor staffului
Route::prefix('staff')->group(function () {

    Route::middleware('guest')->group(function () {

        Route::get('/login', [AuthController::class, 'loginForm'])->name('staff.login');
        Route::post('/login', [AuthController::class, 'login'])->name('staff.auth');
    });
});

Route::prefix('staff/cpanel')->middleware(['auth:staff'])->group(function () {
    Route::get('/', [PersonalController::class, 'showControlPanel'])->name('control-panel');

    //logout staff
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout-staff');
});

//rutele pentru manageri
Route::prefix('staff/cpanel/manager')->middleware(['auth:staff', 'manager'])->group(function () {
    Route::get('staff', [ManagerController::class, 'showStaff'])->name('show.staff');

    //adaugarea unui membru staff
    Route::get('staff/new', [ManagerController::class, 'newStaff'])->name('new.staff');
    Route::post('staff/new', [ManagerController::class, 'createStaff'])->name('create.staff');

    //editarea dateluor unui membru staff
    Route::get('staff/edit/{id}', [ManagerController::class, 'editStaff'])->name('edit.staff');
    Route::put('staff/edit/{id}', [ManagerController::class, 'updateStaff'])->name('update.staff');

    //modificarea parolei unui membru staff
    Route::put('/staff/edit/pass/{id}', [ManagerController::class, 'updatePassword'])->name('password.staff');

    //blocarea unui membru staff
    Route::delete('/staff/block/{id}', [ManagerController::class, 'blockStaff'])->name('block.staff');

    //deblocarea unui membru stafff
    Route::put('/staff/restore/{id}', [ManagerController::class, 'restoreStaff'])->name('restore.staff');

    // stergerea definitiva a unui membru stafff
     //blocarea unui membru staff
     Route::delete('/staff/remove/{id}', [ManagerController::class, 'removeStaff'])->name('remove.staff');
});
