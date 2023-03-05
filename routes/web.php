<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
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
Route::get('/admin/{slug}/edit', [UserController::class, 'edit']);
Route::put('/admin/{slug}', [UserController::class, 'update']);
Route::delete('/admin/{slug}', [UserController::class, 'destroy']);

route::get('/superadmin', [SupUserController::class, 'index']);
route::post('/superadmin', [SupUserController::class, 'store']);
Route::get('/superadmin/{slug}/edit', [SupUserController::class, 'edit']);
Route::put('/superadmin/{slug}', [SupUserController::class, 'update']);
Route::delete('/superadmin/{slug}', [SupUserController::class, 'destroy']);

route::get('/category', [CategoryController::class, 'index']);
route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{slug}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{slug}', [CategoryController::class, 'update']);
Route::delete('/category/{slug}', [CategoryController::class, 'destroy']);

route::get('/document', [DocumentController::class, 'index']);
route::post('/document', [DocumentController::class, 'store']);
Route::get('/document/{slug}/edit', [DocumentController::class, 'edit']);
Route::put('/document/{id}', [DocumentController::class, 'update']);
Route::delete('/document/{slug}', [DocumentController::class, 'destroy']);
Route::get('/document/{slug}/download', [DocumentController::class, 'download']);
Route::get('/backup', [DocumentController::class, 'backup']);

Route::get('reportUser', [ReportController::class, 'index']);
Route::get('reportDocument', [ReportController::class, 'document']);
