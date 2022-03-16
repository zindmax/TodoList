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

Route::get('/', function(){
    return view('dashboard');
})->name('dashboard');

//Route::get('/', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('show_categories');
Route::post('/categories/add', [\App\Http\Controllers\CategoryController::class, 'add'])->name('add_category');
Route::delete('/categories/{id}/delete', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('delete_category');

Route::get('/categories/{id}', [\App\Http\Controllers\TodoController::class, 'index'])->name('show_category');
Route::post('/categories/{id}/add', [\App\Http\Controllers\TodoController::class, 'add'])->name('add_todo');
Route::delete('/todo/{id}/delete', [\App\Http\Controllers\TodoController::class, 'delete'])->name('delete_todo');

Route::get('/todo/{id}', [\App\Http\Controllers\TodoItemController::class, 'index'])->name('show_items');
Route::post('/todo/{id}/add', [\App\Http\Controllers\TodoItemController::class, 'store'])->name('add_item');
Route::delete('/todo/{id}/delete/{itemId}', [\App\Http\Controllers\TodoItemController::class, 'delete'])->name('delete_item');

require __DIR__.'/auth.php';
