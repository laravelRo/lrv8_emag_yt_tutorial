<?php

use App\Http\Controllers\Front\OrdersController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->prefix('account')->name('account.')->group(function () {
    //ruta pentru listarea comenzilor unui utilizator
    Route::get('orders', [OrdersController::class, 'listOrders'])->name('orders.list');

    //ruta pentru afisarea comenziii in format pdf
    Route::get('pdf-order/{id}', [OrdersController::class, 'showPdf'])->name('orders.pdf');
});
