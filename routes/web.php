<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('pages.users.home');
// })->name('home');

Auth::routes();

Route::prefix('/home')->name('users.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/event', [HomeController::class, 'event'])->name('event');
    Route::get('/detail', [HomeController::class, 'detail'])->name('detail');
    Route::get('/order', [HomeController::class, 'order'])->name('order');
});
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('/order', [AdminController::class, 'order'])->name('order');
    
});