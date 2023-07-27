<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TypeController;

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


Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    route::get('/user', [UserController::class, 'index']);
    route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{slug}/edit', [UserController::class, 'edit']);
    Route::put('/user/{slug}', [UserController::class, 'update']);
    Route::delete('/user/{slug}', [UserController::class, 'destroy']);

    route::get('/type', [TypeController::class, 'index'])->name('type.index');
    route::post('/type', [TypeController::class, 'store'])->name('type.store');
    Route::put('/type/{slug}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('/type/{slug}', [TypeController::class, 'destroy'])->name('type.destroy');

    route::get('/category', [CategoryController::class, 'index']);
    route::post('/category', [CategoryController::class, 'store']);
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

});
