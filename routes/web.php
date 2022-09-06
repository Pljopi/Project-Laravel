<?php

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
    return view('layouts/base_html');
});

Route::get('/home', function () {
    return view('layouts/base_html');
});

Route::get('/login', function () {
    return view('layouts/base_html');
});

Route::get('/favourites', function () {
    return view('pages/favourites_html');
});
Route::get('/list', function () {
    return view('pages/list_html');
});
route::get('/login', function () {
    return view('pages/login_html');
});
route::get('/signup', function () {
    return view('pages/signup_html');
});