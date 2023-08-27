<?php

use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\OutgoingMailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth'])->group(function () {

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

    Route::prefix('surat-masuk')->group(function () {
        route::get('/', [IncomingMailController::class, 'index'])->name('surat-masuk.index');
        route::post('/', [IncomingMailController::class, 'store'])->name('surat-masuk.store');
        Route::get('/{id}/edit', [IncomingMailController::class, 'edit'])->name('surat-masuk.edit');
        Route::put('/{id}', [IncomingMailController::class, 'update'])->name('surat-masuk.update');
        Route::delete('/{id}', [IncomingMailController::class, 'destroy'])->name('surat-masuk.destroy');
        Route::get('/{id}/download', [IncomingMailController::class, 'download'])->name('surat-masuk.download');
    });

    Route::prefix('surat-keluar')->group(function () {
        route::get('/', [OutgoingMailController::class, 'index'])->name('surat-keluar.index');
        route::post('/', [OutgoingMailController::class, 'store'])->name('surat-keluar.store');
        Route::get('/{id}/edit', [OutgoingMailController::class, 'edit'])->name('surat-keluar.edit');
        Route::put('/{id}', [OutgoingMailController::class, 'update'])->name('surat-keluar.update');
        Route::delete('/{id}', [OutgoingMailController::class, 'destroy'])->name('surat-keluar.destroy');
        Route::get('/{id}/download', [OutgoingMailController::class, 'download'])->name('surat-keluar.download');
    });

    Route::get('/backup', [DocumentController::class, 'backup']);
    Route::get('reportUser', [ReportController::class, 'index']);
    Route::get('reportDocument', [ReportController::class, 'document']);

    Route::prefix('account')->group(function () {
        Route::get('/{slug}/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});
