<?php

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

  Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::prefix('user')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('user-list');
        Route::get('/get', [UserController::class, 'userList']);
        Route::post('/save', [UserController::class, 'createOrUpdate'])->name('user-save');
        Route::get('/find/{id}', [UserController::class, 'find']);
        Route::get('/delete/{id}', [UserController::class, 'delete']);

    });
});
