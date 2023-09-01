<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('/manager/{news}/edit', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::post('/manager/{news}', [ManagerController::class, 'update'])->name('manager.update');
    Route::get('/manager/{news}', [ManagerController::class, 'destroy'])->name('manager.destroy');
});
Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/filter/{category}', [NewsController::class, 'filter'])->name('news.filter');

Auth::routes();
