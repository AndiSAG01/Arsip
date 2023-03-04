<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupUserController;
use App\Http\Controllers\UserController;
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
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
route::get('/admin', [UserController::class, 'index']);
route::post('/admin', [UserController::class, 'store']);
Route::get('/admin/{user:slug}/edit', [UserController::class, 'edit']);
Route::put('/admin/{user:slug}', [UserController::class, 'update']);
Route::delete('/admin/{user:slug}', [UserController::class, 'destroy']);

route::get('/superadmin', [SupUserController::class, 'index']);
route::post('/superadmin', [SupUserController::class, 'store']);
Route::get('/superadmin/{user:slug}/edit', [SupUserController::class, 'edit']);
Route::put('/superadmin/{user:slug}', [SupUserController::class, 'update']);
Route::delete('/superadmin/{user:slug}', [SupUserController::class, 'destroy']);

route::get('/category', [CategoryController::class, 'index']);
route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{user:slug}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{user:slug}', [CategoryController::class, 'update']);
Route::delete('/category/{user:slug}', [CategoryController::class, 'destroy']);