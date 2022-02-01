<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
// rutele publice
require __DIR__ . '/front/pages.php';
//rutele pentru panoul de control al utilizatorilor
require __DIR__ . '/front/user.php';

//rutele pentru personalul administrativ al sitului
require __DIR__ . '/admin/staff.php';

//rutele pentru userii externi ai sitului
require __DIR__ . '/admin/users.php';

// ======================
//rutele de administrare a continutului sitului
// ========================

//rutele pentru sectiuni
require __DIR__ . '/admin/content/sections.php';

//rutele pentru categorii
require __DIR__ . '/admin/content/categories.php';

//rutele pentru branduri
require __DIR__ . '/admin/content/brands.php';

//rutele pentru produse
require __DIR__ . '/admin/content/products.php';


// ======================
//rutele frontend pentru continut
// ========================

//rutele pentru sectiuni
require __DIR__ . '/front/content/products.php';
