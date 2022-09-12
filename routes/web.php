<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomDashboardController;
use App\Http\Middleware\AlreadyLoggedIn;
use App\Http\Middleware\UserData;
use App\Http\Middleware\LoggedUserInfo;
use App\Http\Controllers\CustomCryptoApiController;
use App\Http\Controllers\CustomFavouritesController;
use Illuminate\Http\Request;

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
Route::get('/', function () {
    return view('home');
});

Route::controller(CustomAuthController::class)->group(function(){

    Route::get('/login', 'login')->middleware('LoggedUserInfo')->middleware('isAlreadyLoggedIn')->name ('login');

    Route::post('login-user',  'loginUser')->name('login-user');
    
    Route::get('/signup','registration');
    
    Route::post('/register-user', 'registerUser')->name('register-user');

    Route::get('/logout', 'logout')->name('logout');
    
});


Route::controller(CustomDashboardController::class)->group(function(){

    Route::get('/dashboard', 'dashboard')->middleware('LoggedUserInfo')->middleware('isLoggedIn')->name('dashboard');
});


Route::controller(CustomCryptoApiController::class)->group(function(){

    Route::get('show_list', 'getListOfCurrencies')->middleware('LoggedUserInfo')->name('show_list');
  
});

Route::controller(CustomFavouritesController::class)->group(function(){

Route::get('add_favourite', 'insertFavourite')->name('add_favourite');

Route::get('remove_favourite', 'removeFromFavourites')->name('remove_favourite');

Route::get('favourites', 'showFavourites')->middleware('LoggedUserInfo')->name('favourites');


});








Route::view('/home', 'pages/list_html')->middleware('LoggedUserInfo')->name('home');

Route::view('/', 'pages/list_html')->middleware('LoggedUserInfo')->name('/');




