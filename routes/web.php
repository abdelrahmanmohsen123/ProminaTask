<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\PictureController;

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
Route::group(['prefix'=>'admin'],function(){
    Route::resource('albums', AlbumController::class);
    Route::resource('pictures', PictureController::class);

});
