<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\SectionsController;
use App\Http\Controllers\Front\BrandsController;
use App\Http\Controllers\Front\ProductsController;

//rutele pentru paginile publice
Route::get('/section/{slug}', [SectionsController::class, 'showSection'])->name('section');
Route::get('/section/products/{slug}', [SectionsController::class, 'showSectionProducts'])->name('section.products');

//afisam in frontend pagina unei categorii
Route::get('/category/{slug}', [SectionsController::class, 'showCategory'])->name('category');
Route::get('/category/products/{slug}', [SectionsController::class, 'showCategoryProducts'])->name('category.products');

//afisam pagina cu brandurui in front-end
Route::get('brands/', [BrandsController::class, 'listBrands'])->name('brands');
//afisam pagina unui brand
Route::get('brand/{slug}', [BrandsController::class, 'viewBrand'])->name('brand');
//afisam produsele unui brand
Route::get('brand/products/{slug}', [BrandsController::class, 'viewBrandProducts'])->name('brand.products');


// routa unui produs
Route::get('product/{slug}', [ProductsController::class, 'showProduct'])->name('product');
