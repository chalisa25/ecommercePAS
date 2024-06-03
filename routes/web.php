<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('homepage');
});

// Route::controller(AuthController::class)->group(function () {
//     Route::get('register', 'register')->name('register');
//     Route::post('register', 'registerSave')->name('register.save');

//     Route::get('login', 'login')->name('login');
//     Route::post('login', 'loginAction')->name('login.action');

//     Route::get('logout', 'logout')->middleware('auth')->name('logout');
// });

// Pastikan menggunakan controller untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'admin']);

Route::controller(VehicleController::class)->prefix('products')->group(function () {
    Route::get('', 'index')->name('products');
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});

Route::get('/kendaraan', [VehicleController::class, 'index'])->middleware('auth','admin');
Route::get('/pelanggan', [PelangganController::class, 'index'])->middleware('auth','admin');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth','admin');

// Rute autentik
Auth::routes();

// Rute login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Rute untuk home
// Route::get('/home', [HomeController::class, 'index'])->name('home');
