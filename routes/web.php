<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoItemController;
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

Route::view('/', 'dashboard')->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('todos', TodoController::class);
    Route::resource('items', ItemController::class)->only(['store', 'edit', 'destroy']);
});

require __DIR__.'/auth.php';
