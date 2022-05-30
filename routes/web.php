<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BrandController;
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


Route::get('/', [Controller::class, 'index']);

//Avtorizatsiya avtorizatsiya arqali admin panelge otiw
Route::group(['middleware' => ['auth', 'web']], function() {

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('test', function (){
        dd('1323232');
    });

    Route::resource('post', PostController::class);

    Route::resource('brand', BrandController::class);

});
