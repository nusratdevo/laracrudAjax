<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TodoController;

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
Route::resource('product', ProductController::class);

Route::get('/', [EmployeeController::class, 'index']);
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeeController::class, 'update'])->name('update');

//php artisan make:model Post -mc --resource
//appServiceProvider->boo(){Paginator::useBootstrap();}
Route::resource('post', 'App\Http\Controllers\PostController');

//Todo Ajax
Route::get('/todos', [TodoController::class,'index']);
Route::get('todos/{todo}/edit', [TodoController::class,'edit']);
Route::post('todos/store', [TodoController::class,'store']);
Route::delete('todos/destroy/{todo}', [TodoController::class,'destroy']);
