<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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

Route::get('/', [IndexController::class, 'index'])
->middleware('auth');
Route::get('/show', [IndexController::class, 'show'])
->middleware('auth');

Route::resource('entry', EntryController::class)
->middleware('auth');

Route::get('login', [LoginController::class, 'create'])
->name('login');
Route::post('login', [LoginController::class, 'store'])
->name('login.store');
Route::delete('logout', [LoginController::class, 'destroy'])
->name('logout');

Route::get('register', [RegisterController::class, 'create'])
->name('register');
Route::post('register', [RegisterController::class, 'store'])
->name('register.store');

Route::resource('user', UserController::class)
->except(['create', 'store'])
->middleware('auth');
