<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
