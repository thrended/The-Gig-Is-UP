<?php

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

Route::get('/account-create','HomeController@register');
Route::post('/save-account','HomeController@registerSave');
Route::post('/reset-password','HomeController@resetPassword');
Route::get('/login','HomeController@login');
Route::post('/login','HomeController@loginCheck');
Route::get('/logout', 'HomeController@logout');

Route::get('/home', function() {
    return redirect('/');
});
Route::get('/', 'HomeController@index');

Route::get('/event/create','HomeController@createEvent');
Route::get('/event/{id}','HomeController@showEvent');

Route::post('/search','HomeController@search');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::post('/save-event','HomeController@saveEvent');
