<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
});


Route::namespace('App\Http\Controllers\Testjob')->group(function(){

    Route::middleware('checkguest')->group(function(){
            Route::get('/', 'MainController@viewlogin');
            Route::post('/dologin', 'MainController@login')->name('login');
            Route::get('/signup', 'MainController@viewsignup');
            Route::post('/dosignup', 'MainController@signup')->name('signup');
    });

    Route::middleware('checkauth')->group(function(){
        Route::get('/home', 'MainController@viewhome');
        Route::post('/uploadcsv', 'MainController@uploadcsv')->name('uploadcsv');
        Route::post('/logout', 'MainController@logout')->name('logout');
    });
   
});
