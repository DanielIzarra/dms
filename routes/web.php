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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('User', 'UserController');

Route::get('/profile','UserController@edit')->name('profile');

Route::patch('profile/update/{user}', 'UserController@update')->name('user.update');

Route::resource('File', 'FileController');

Route::get('/file/{file?}','FileController@show')->name('file.show');

Route::post('/file/store','FileController@store')->name('file.store');

Route::patch('file/update/{file}', 'FileController@update')->name('file.update');
