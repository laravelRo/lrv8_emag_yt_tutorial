<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\SectionsController;
use App\Http\Controllers\Front\BrandsController;

//rutele pentru paginile publice
Route::get('/section/{slug}', [SectionsController::class, 'showSection'])->name('section');

//afisam in frontend pagina unei categorii
Route::get('/category/{slug}', [SectionsController::class, 'showCategory'])->name('category');

//afisam pagina cu brandurui in front-end
Route::get('brands/', [BrandsController::class, 'listBrands'])->name('brands');
//afisam pagina unui brand
Route::get('brand/{slug}', [BrandsController::class, 'viewBrand'])->name('brand');
