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
    return view('welcome');
});

Route::get('/login','LoginController@login')->name('login');
Route::post('/login','LoginController@loginUser')->name('login_user');
Route::get('/register','LoginController@register')->name('register');
Route::post('/register','LoginController@registerUser')->name('register_user');
Route::get('/home','LoginController@home')->name('home');
Route::get('/user_info','LoginController@userInfo');
Route::get('/random_number','LoginController@random_number');
Route::post('/generate_key','LoginController@generateKey');
Route::get('/activate','LoginController@activate');
Route::post('/activate_key','LoginController@activateKey');
