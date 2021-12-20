<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\BrandsController;

Route::prefix('staff/content/brands')->middleware(['auth:staff'])->group(function () {
    //afisam lista cu sectiuni
    Route::get('list', [BrandsController::class, 'listBrands'])->name('brands.list');

    //crearea unui nou brand
    Route::get('new', [BrandsController::class, 'newBrand'])->name('brands.new');
    Route::post('new', [BrandsController::class, 'addBrand'])->name('brands.add');

    //editarea brandurilor
    Route::get('edit/{id}', [BrandsController::class, 'editBrand'])->name('brands.edit');
    Route::put('update/{id}', [BrandsController::class, 'updateBrand'])->name('brands.update');


    // adaugarea unei galerii foto pentru branduri
    Route::get('photos/{id}',  [BrandsController::class, 'photosCategory'])->name('brands.photos');
});
