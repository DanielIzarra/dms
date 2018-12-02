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

    Route::post('users/store', 'UserController@store')->name('users.store')->middleware('permission:users_create');
    
    Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users_index');
    
    Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users_create');
    
    Route::patch('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users_edit');
    
    Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users_show');
    
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users_destroy');
    
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users_edit');


    // Companies

    Route::post('companies/store', 'CompanyController@store')->name('companies.store')->middleware('permission:companies_create');
    
    Route::get('companies', 'CompanyController@index')->name('companies.index')->middleware('permission:companies_index');
    
    Route::get('companies/create', 'CompanyController@create')->name('companies.create')->middleware('permission:companies_create');
    
    Route::patch('companies/{company}', 'CompanyController@update')->name('companies.update')->middleware('permission:companies_edit');
    
    Route::get('companies/{company}', 'CompanyController@show')->name('companies.show')->middleware('permission:companies_show');
    
    Route::delete('companies/{company}', 'CompanyController@destroy')->name('companies.destroy')->middleware('permission:companies_destroy');
    
    Route::get('companies/{company}/edit', 'CompanyController@edit')->name('companies.edit')->middleware('permission:companies_edit');


    // Departments

    Route::post('departments/store', 'DepartmentController@store')->name('departments.store')->middleware('permission:departments_create');
    
    Route::get('departments', 'DepartmentController@index')->name('departments.index')->middleware('permission:departments_index');
    
    Route::get('departments/create', 'DepartmentController@create')->name('departments.create')->middleware('permission:departments_create');
    
    Route::patch('departments/{department}', 'DepartmentController@update')->name('departments.update')->middleware('permission:departments_edit');
    
    Route::get('departments/{department}', 'DepartmentController@show')->name('departments.show')->middleware('permission:departments_show');
    
    Route::delete('departments/{department}', 'DepartmentController@destroy')->name('departments.destroy')->middleware('permission:departments_destroy');
    
    Route::get('departments/{department}/edit', 'DepartmentController@edit')->name('departments.edit')->middleware('permission:departments_edit');


    // Roles

    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles_create');

    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles_index');
    
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles_create');
    
    Route::patch('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles_edit');
    
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles_destroy');
    
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles_edit');
    
});