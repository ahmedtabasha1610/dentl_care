<?php

use App\Http\Controllers\AppoimentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ServiceController;
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
});
Route::resource('services',ServiceController::class);
Route::resource('categories',CategoryController::class);

Route::resource('doctors',DoctorController::class);
Route::resource('prices',PriceController::class);
Route::resource('appoiments',AppoimentController::class);


Route::fallback(function (){
   return view('404page');
});
