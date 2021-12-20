<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\CategoriesController;

Route::prefix('staff/content/categories')->middleware(['auth:staff'])->group(function () {
    //afisam lista cu sectiuni
    Route::get('list', [CategoriesController::class, 'listCategories'])->name('categories.list');

    //crearea unei noi categorii pentru o anumita sectiune
    Route::get('new/{id}', [CategoriesController::class, 'newCategory'])->name('categories.new');
    Route::post('new/{id}', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //editarea categoriilor
    Route::get('edit/{id}', [CategoriesController::class, 'editCategory'])->name('categories.edit');
    Route::put('update/{id}', [CategoriesController::class, 'updateCategory'])->name('categories.update');


    //adaugarea unei galerii foto pentru categorii
    Route::get('photos/{id}',  [CategoriesController::class, 'photosCategory'])->name('categories.photos');
});
