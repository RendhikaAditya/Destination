<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/lokasi', [HomeController::class, 'lokasi'])->name('/lokasi');
Route::get('/destination/show/{id}', [HomeController::class, 'showdestinasi'])->name('/destination/show');
Route::get('/location/show/{id}', [HomeController::class, 'showlokasi'])->name('/location/show');
// Route::get('/admin/login', [HomeController::class, 'login'])->name('login');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'actionlogin'])->name('actionlogin'); // Route untuk menangani form login POST
Route::get('/logout', [LoginController::class, 'actionlogout']);
    
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'actionregister'])->name('actionregister'); // Route untuk menangani form REGISTER POST

