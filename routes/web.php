<?php

use App\Http\Controllers\DashboardLaporanController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    Route::post('/register', 'register');
    Route::post('user/logout', 'logout')->middleware('auth');
});

Route::controller(App\Http\Controllers\LaporanController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('lapor', 'index');
        Route::post('lapor', 'create');
    });

Route::controller(App\Http\Controllers\AdminController::class)->group(function () {
    Route::get('/admin', 'index');
    Route::get('/admin/register', 'register');
    Route::post('/admin/login', 'authenticate');
    Route::post('/admin/register', 'create');
});

Route::group([
    'middleware' => 'is_admin',
    'prefix' => 'admin',
    'as' => 'admin'
], function () {
    Route::controller(App\Http\Controllers\DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
    });
    Route::resource('dashboard/laporan', DashboardLaporanController::class);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'user',
    'as' => 'user'
], function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
    Route::resource('dashboard/laporan', DashboardLaporanController::class);
    Route::get('dashboard/profile', function () {
        return view('dashboard.profile.index', [
            'title' => 'Profile',
            'user' => User::where('id', auth()->user()->id)->get()
        ]);
    });
});
