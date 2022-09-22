<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\AttributesController;

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
