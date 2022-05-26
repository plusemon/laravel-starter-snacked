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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::as('accounts.')
    ->prefix('myaccount')
    ->middleware(['auth'])
    ->group(function () {
        
        Route::get('/dashboard', function () {
            return view('accounts.dashboard');
        })->name('dashboard');

        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->only(['index','store', 'destroy']);
        Route::resource('permissions', App\Http\Controllers\Admin\PermissionController::class);
        Route::resource('subscribers', App\Http\Controllers\Admin\SubscriberController::class);
    });


require __DIR__ . '/auth.php';
