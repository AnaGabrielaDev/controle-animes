<?php

use App\Http\Controllers\AnimesController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function (){
    Route::get('/animes',[AnimesController::class, 'index'])->middleware('auth');
    Route::get('/animes/create',[AnimesController::class, 'create']);
    Route::post('/animes/create',[AnimesController::class, 'store']);
    Route::post('/animes/remove/{id}', [AnimesController::class,'destroy']);
    Route::get('/animes/{animeId}/temporadas', [TemporadasController::class, 'index']);
});

Auth::routes();

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
