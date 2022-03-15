<?php

use App\Models\Todo;
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

Route::get('/', function () {
    return view('welcome');
})->name("dashboard");

//[\App\Http\Controllers\TodoController::class, "index"]
Route::get('/todo', [\App\Http\Controllers\TodoController::class, "index"])->name("todo");
Route::post('/todo', [\App\Http\Controllers\TodoController::class, "store"])->name("add_todo");
Route::delete("/todo/{id}/delete", [\App\Http\Controllers\TodoController::class, "delete"])->name("delete_todo");
