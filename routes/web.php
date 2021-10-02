<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MealCategoryController;
use App\Http\Controllers\MealOptionController;
use App\Http\Controllers\MealChoiceController;

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

Route::get('/', [UserController::class, 'home']);

Route::get('/register', [UserController::class, 'getRegister']);
Route::post('/register', [UserController::class, 'setRegister']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'setLogin']);

Route::post('/logout', [LoginController::class, 'Logout']);

Route::group(['middleware' => 'auth'], function(){

    Route::get('order', [MealOptionController::class, 'getOrder']);
    Route::post('order', [MealOptionController::class, 'setOrder']);
});
