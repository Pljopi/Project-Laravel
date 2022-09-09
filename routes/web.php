<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomDashboardController;
use App\Http\Middleware\AlreadyLoggedIn;
use App\Http\Middleware\UserData;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now register-user something great!
|
*/

Route::controller(CustomAuthController::class)->group(function(){

    Route::get('/login', 'login')->middleware('isAlreadyLoggedIn');

    Route::post('login-user',  'loginUser')->name('login-user');
    
    Route::get('/signup','registration');
    
    Route::post('/register-user', 'registerUser')->name('register-user');

    Route::get('/logout', 'logout');
    
});


Route::controller(CustomDashboardController::class)->group(function(){

    Route::get('/dashboard', 'dashboard')->middleware('isLoggedIn');
});



Route::get('/', function () {
    return view('home');
});

Route::view('/favourites', 'pages/favourites_html')->middleware('UserData');

Route::view('/list', 'pages/list_html');

Route::view('/show_list', 'pages/show__list_html');

Route::view('/home', 'layouts/base_html');

Route::view('/', 'layouts/base_html');


