<?php

use \Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('/welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home/search', 'HomeController@search');


Route::get('/weather', 'WeatherController@index');
Route::get('/weather/search', 'WeatherController@search');

//show edit form
Route::get('/home/user/edit/{id}', 'HomeController@edit');

//update
Route::post('/home/user/edit/{id}', 'HomeController@update');

//show delete form
Route::get('/home/user/delete/{id}', 'HomeController@delete');

//destroy
Route::post('/home/user/destroy/{id}', 'HomeController@destroy');