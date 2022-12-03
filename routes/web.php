<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SetorCicilanController;

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

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [MainController::class, 'home'])->middleware('login');
Route::get('/laporan', [MainController::class, 'laporan'])->middleware('login');

Route::resource('/users', UserController::class)->middleware('login');
Route::resource('/nasabah', NasabahController::class)->middleware('login');
Route::resource('/peminjaman', PeminjamanController::class)->middleware('login');
Route::resource('/simpanan', SimpananController::class)->middleware('login');
