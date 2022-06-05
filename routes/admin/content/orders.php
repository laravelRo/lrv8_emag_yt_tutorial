<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\OrdersController;

Route::prefix('staff/content/orders')
    ->middleware(['auth:staff'])
    ->controller(OrdersController::class)
    ->name('admin.')
    ->group(
        function () {
            //afisam tabelul cu toate comenzile paginate
            Route::get('list', 'listOrders')->name('orders.list');

            //afisam detaliile unei comenzi
            Route::get('{id}', 'editOrder')->name('orders.edit');
        }
    );
