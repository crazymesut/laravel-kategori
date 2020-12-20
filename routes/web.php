<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', [CategoryController::class, 'show'])->name('category.show');
Route::get('/kategori/list', [CategoryController::class, 'list'])->name('category.list');
Route::get('/kategori/tree', [CategoryController::class, 'tree'])->name('category.tree');


//Route::get('/kat_ekle', [CategoryController::class, 'createText']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
