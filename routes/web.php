<?php

use App\Http\Controllers\AnimesController;
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

Route::get('/ola', function(){
    echo "ola mundooo";
});

Route::get('/animes',[AnimesController::class, 'index']);
Route::get('/animes/create',[AnimesController::class, 'create']);

    
    