<?php

use App\Http\Middleware\AuthCheck;
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


Route::prefix('app')->middleware(AuthCheck::class)->group( function (){
    // RUTA PARA SUBIR UNA IMAGEN
    Route::post('/upload','UploadImage@uploadImage');
    Route::get('/getUsers', 'Controller@getUsers');
});



// RUTA APP_LOGIN
Route::post('/app/login','Admin_controller@adminLogin');

Route::get('/logout','Controller@logout');
Route::get('/',function(){
    return view('inicio');
})->name('inicio');
Route::any('/{slug}','Controller@index');
