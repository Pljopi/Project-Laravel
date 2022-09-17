<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomDashboardController;
use App\Http\Middleware\AlreadyLoggedIn;
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
Route::view('/', 'layouts/base_html')->name('/');

Route::middleware(['throttle:login'])->group(function() {

    Route::controller(CustomAuthController::class)->group(function(){

        Route::get('/login', 'login')->middleware('isAlreadyLoggedIn')->name ('login');
    
        Route::post('loginuser',  'loginUser')->name('loginuser');
        
        Route::get('/signup','registration')->name('signup');
        
        Route::post('/register-user', 'registerUser')->name('register-user');
    
        Route::get('/logout', 'logout')->name('logout');
        
    });
});




Route::controller(CustomDashboardController::class)->group(function(){

    Route::get('/dashboard', 'dashboard')->middleware('isLoggedIn')->name('dashboard');
});


Route::controller(CustomCryptoApiController::class)->group(function(){

    Route::get('show_list', 'getListOfCurrencies')->name('show_list');

    Route::get('home', 'GetListOfCurrenciesHome')->name('home');
    
    Route::get('/price', 'getPrice')->name('price');
});



Route::controller(CustomFavouritesController::class)->group(function(){

Route::get('add_favourite', 'insertFavourite')->name('add_favourite');

Route::get('remove_favourite', 'removeFromFavourites')->name('remove_favourite');

Route::get('favourites', 'showFavourites')->name('favourites');

});
















