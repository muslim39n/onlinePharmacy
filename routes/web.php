<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::post('/search', [MainController::class, 'search'])->name('search');

//USER CONTROLLER
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginPost', [UserController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// BASKET CONTROLLER
Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::post('/addToBasket', [BasketController::class, 'addToBasket'])->name('addToBasket');

//ADMIN CONTROLLER
Route::get('/newMedicine', [AdminController::class, 'newMedicine'])->name('newMedicine');
Route::post('/addmedicine', [AdminController::class, 'addMedicine'])->name('addMedicine');
