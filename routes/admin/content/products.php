<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\ProductsController;

Route::prefix('staff/content/products')
    ->middleware(['auth:staff'])
    ->controller(ProductsController::class)
    ->group(function () {

        //afisam lista produselor
        Route::get('list', 'listProducts')->name('products.list');

        //crearea unui nou produs
        Route::get('new', 'newProduct')->name('products.new');
        Route::post('new', 'addProduct')->name('products.add');

        //editarea unui produs
        Route::get('edit/{id}/{currentPage?}', 'editProduct')->name('products.edit');
        Route::put('update/{id}', 'updateProduct')->name('products.update');


        //adaugarea unei galerii foto pentru categorii
        Route::get('photos/{id}/{currentPage?}',  'photosProducts')->name('products.photos');



        //editarea categoriilor
        // Route::get('edit/{id}', [CategoriesController::class, 'editCategory'])->name('categories.edit');
        // Route::put('update/{id}', [CategoriesController::class, 'updateCategory'])->name('categories.update');


        //adaugarea unei galerii foto pentru categorii
        // Route::get('photos/{id}',  [CategoriesController::class, 'photosCategory'])->name('categories.photos');
    });
