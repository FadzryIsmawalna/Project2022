<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'showFormLogin'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware('auth');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::resource('menu', MenuController::class);
Route::resource('customer', CustomerController::class);
Route::resource('order', OrderController::class);

 /*Route::prefix('order')->group(function() {
	Route::get('/index',[CustomerController::class,'index']);
	Route::get('/create',[CustomerController::class,'create']);
 	Route::get('/store',[CustomerController::class,'store']);
 	Route::get('/edit/{id}',[CustomerController::class,'edit']);
 	Route::get('/update{id}',[CustomerController::class,'update']);
 	Route::get('/destroy{id}',[CustomerController::class,'destroy']);
 });*/
 
