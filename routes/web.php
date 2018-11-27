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

//Route::get('/profile','UserController@edit')->name('profile');
//Route::get('user/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');

//Route::patch('profile/update/{user}', 'UserController@update')->name('user.update');
//Route::patch('user/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');

Route::middleware(['auth', 'verified'])->group(function(){
   
    // Users

    Route::post('users/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');
    
    Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
    
    Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
    
    Route::patch('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
    
    Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users.show');
    
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');
    
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');


    // Companies

    Route::post('companies/store', 'CompanyController@store')->name('companies.store')->middleware('permission:companies.create');
    
    Route::get('companies', 'CompanyController@index')->name('companies.index')->middleware('permission:companies.index');
    
    Route::get('companies/create', 'CompanyController@create')->name('companies.create')->middleware('permission:companies.create');
    
    Route::patch('companies/{company}', 'CompanyController@update')->name('companies.update')->middleware('permission:companies.edit');
    
    Route::get('companies/{company}', 'CompanyController@show')->name('companies.show')->middleware('permission:companies.show');
    
    Route::delete('companies/{company}', 'CompanyController@destroy')->name('companies.destroy')->middleware('permission:companies.destroy');
    
    Route::get('companies/{company}/edit', 'CompanyController@edit')->name('companies.edit')->middleware('permission:companies.edit');


    // Departments

    Route::post('departments/store', 'DepartmentController@store')->name('departments.store')->middleware('permission:departments.create');
    
    Route::get('departments', 'DepartmentController@index')->name('departments.index')->middleware('permission:departments.index');
    
    Route::get('departments/create', 'DepartmentController@create')->name('departments.create')->middleware('permission:departments.create');
    
    Route::patch('departments/{department}', 'DepartmentController@update')->name('departments.update')->middleware('permission:departments.edit');
    
    Route::get('departments/{department}', 'DepartmentController@show')->name('departments.show')->middleware('permission:departments.show');
    
    Route::delete('departments/{department}', 'DepartmentController@destroy')->name('departments.destroy')->middleware('permission:departments.destroy');
    
    Route::get('departments/{department}/edit', 'DepartmentController@edit')->name('departments.edit')->middleware('permission:departments.edit');


    // Roles

    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    
    Route::patch('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
    
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
    
});