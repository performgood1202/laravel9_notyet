<?php

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


Route::get('/exportcsv', [App\Http\Controllers\FrontendController::class, 'exportcsv'])->name('exportcsv');
Route::post('/checkCode', [App\Http\Controllers\FrontendController::class, 'checkCode'])->name('checkCode');