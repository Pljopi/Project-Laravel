<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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


Route::view('/home', 'layouts/base_html');

Route::view('/', 'layouts/base_html');

Route::get('/login', [CustomAuthController::class, 'login']);

Route::get('/signup', [CustomAuthController::class, 'registration']);

Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');

Route::view('/favourites', 'pages/favourites_html');

Route::view('/list', 'pages/list_html');

Route::view('/show_list', 'pages/show__list_html');



