<?php

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

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('login');
});

Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('/login', 'authenticate');

    Route::post('/register', 'register')->middleware('guest');

    Route::post('logout', 'logout')->middleware('auth');
});

Route::controller(App\Http\Controllers\LaporanController::class)->group(function () {
    Route::get('lapor', 'index');
    Route::post('lapor', 'create')->middleware('auth');
});

Route::middleware('is_admin')->group(function () {
    // Route::controller('')
});

Route::middleware('auth')->group(function () {
    Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard');
    });
});
