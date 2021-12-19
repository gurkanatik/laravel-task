<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;

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
    return view('pages/home');
});

Route::resource('category', CategoryController::class);
Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::resource('blog', BlogController::class);
Route::get('blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
