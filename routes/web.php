<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
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

// ------------------------------- ROUTES WITHOUT AUTH -------------------------------------------------------
// ------------------------------- PAGE ROUTES ---------------------------------------------------------------
Route::get('/', [PostController::class, 'index'])->middleware('visitor')->name('index');
Route::get('/articulo/{slug}', [PostController::class, 'search'])->name('search');
Route::get('/categoria/{id}', [PostController::class, 'category'])->name('category');
// ------------------------------- ROUTES AUTH ---------------------------------------------------------------
// ------------------------------- DASHBOARD -----------------------------------------------------------------
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
// ------------------------------- POST CONTROL --------------------------------------------------------------
Route::get('/post', [PostController::class, 'show'])->middleware(['auth'])->name('show');
Route::get('/add-post', [PostController::class, 'create'])->middleware(['auth'])->name('postcreate');
Route::post('/post', [PostController::class, 'store'])->middleware(['auth'])->name('store');
Route::get('/update/{id}/post', [PostController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/update/post', [PostController::class, 'update'])->middleware(['auth'])->name('update');
Route::delete('/delete/{id}/post', [PostController::class, 'destroy'])->middleware(['auth'])->name('destroy');
// ------------------------------- ARTISAN OVER URL ----------------------------------------------------------
Route::get('/linkstorage', function () {
    $result = Artisan::call('storage:link');
    return $result;
});
Route::get('/migrate', function () {
    $result = Artisan::call('migrate');
    return $result;
});
// ------------------------------- ROUTES AUTH ---------------------------------------------------------------
require __DIR__.'/auth.php';
