<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\AttributesController;
use App\Http\Controllers\Admin\Content\ProductsAttributes;
use App\Http\Controllers\admin\Content\SuitesController;


// ==== RUTELE PENTRU ATRIBUTELE SECTIUNILOR ===
Route::prefix('staff/content/attributes')
    ->middleware(['auth:staff'])
    ->name('admin.attributes.')
    ->group(function () {
        Route::get('list', [AttributesController::class, 'listAttributes'])->name('list');

        //adaugam un atribut al produselor
        Route::post('add', [AttributesController::class, 'addAttributes'])->name('add');

        //adaugam valori pentru un atribut - cu parametru attribute_id
        Route::post('add-values/{id}', [AttributesController::class, 'addValue'])->name('add.values');

        //rutele pentru setarea atributelor unei sectiuni
        //argumentul id-ul sectiunii pentur care setam atributele
        Route::get('section-attributes/{id}', [AttributesController::class, 'setSectionAttribute'])
            ->name('set.section');
        //ruta pentru sincronizarea atributelor unei sectiuni
        Route::post('section-attributes/{id}', [AttributesController::class, 'syncSectionAttribute'])
            ->name('sync.section');
    });

// ==== RUTELE PENTRU ATRIBUTELE PRODUSELOR===

Route::prefix('staff/content/products/attributes')
    ->middleware(['auth:staff'])
    ->name('admin.products.attributes.')
    ->group(function () {
        //afisam pagina de editare a atributelor pentru un singur produs
        Route::get('show-attributes-values/{id}/{currentPage?}', [ProductsAttributes::class, 'showProductsAttributes'])->name('list');
    });


// ==== RUTELE PENTRU SERIILE DE PRODUSE ===


Route::prefix('staff/content/suites')
    ->middleware(['auth:staff'])
    ->name('admin.suites.')
    ->group(function () {
        //afisarea paginii principale pentru suitele de produse
        Route::get('list', [SuitesController::class, 'listSuites'])->name('list');

        //crearea unei suite noi de produse
        Route::post('add', [SuitesController::class, 'addSuite'])->name('add');

        //editarea unei suite
        Route::get('edit/{id}', [SuitesController::class, 'editSuite'])->name('edit');
        Route::put('update/{id}', [SuitesController::class, 'updateSuite'])->name('update');

        //stergerea unei rute
        Route::delete('delete/{id}', [SuitesController::class, 'deleteSuite'])->name('delete');
    });
