<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;

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

// Auth::routes();

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('register.create');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('/')->name('users.')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('/event', [HomeController::class, 'event'])->name('event');
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail-event');
    Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('riwayat');
    
    
    // User Routes
    Route::middleware('auth:user')->group(function () {
        // Route::get('/order', [HomeController::class, 'order'])->name('order');
        Route::resource('/transaksi', TransaksiController::class)->only([
            'store',]);
    });
});


// UsersEvent Routes
Route::middleware('auth:userEvent')->group(function () {
    Route::prefix('/user-event')->group(function () {
        Route::get('/', [EventController::class, 'tampilEvent'])->name('user-event.tampil-event');
        Route::resource('/event', EventController::class);
        Route::resource('/tiket', TiketController::class);
    });
});


// Admin Routes
Route::middleware('auth:admin')->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('home');
        Route::get('/order', [AdminController::class, 'order'])->name('order');
        Route::put('/order/accept/{id}', [AdminController::class, 'acceptEvent'])->name('accept');

    });
});