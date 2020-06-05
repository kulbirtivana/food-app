<?php

use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Input;

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('food', 'FoodController');

Route::resource('profiles', 'ProfileController');

Route::post('/food/search', 'SearchController@search')->name('search');

// Route::get('/', 'CartController@shop')->name('shop');
