<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\CouponsController;

Route::prefix('staff/content/coupons')
    ->middleware(['auth:staff'])
    ->controller(CouponsController::class)
    ->name('admin.')
    ->group(
        function () {
            //afisam tabelul cu toate coupoanele paginat
            Route::get('list', 'listCoupons')->name('coupons.list');

            //afisam formularul pentru adaugarea unui coupon
            Route::get('new', 'newCoupon')->name('coupons.new');

            //adaugam in baza de date un nou coupon
            Route::post('add', 'addCoupon')->name('coupons.add');

            //afisam formularul pentru editarea unui coupon
            Route::get('edit/{id}', 'editCoupon')->name('coupons.edit');
            //ruta pentru postarea formularului de update a couponului
            Route::put('update/{id}', 'updateCoupon')->name('coupons.update');


            // //afisam detaliile unei comenzi
            // Route::get('{id}', 'editOrder')->name('orders.edit');
        }
    );
