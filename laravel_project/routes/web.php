<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\adminUserController;
use App\Http\Controllers\adminCController;
use App\Http\Controllers\adminMController;
use App\Http\Controllers\adminOController;
use App\Http\Controllers\adminPController;
use App\Http\Controllers\adminUController;

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
    return view('indexx');
});

Auth::routes();


Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('user', adminUController::class);
Route::resource('category', adminCController::class);
Route::resource('product', adminPController::class);
Route::resource('order', adminOController::class);
Route::resource('message', adminMController::class);
