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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	Route::get('company', 'CompanyController@index')->name('company');
	Route::post('add-company', 'CompanyController@store')->name('new-company');
	Route::get('company/{id}', 'CompanyController@viewCompany')->name('company-hindsite');
	Route::get('company/{id}/edit', 'CompanyController@edit')->name('company-edit');
	Route::post('company/{id}/edit', 'CompanyController@update')->name('company-update');
	Route::post('company/{id}/delete', 'CompanyController@delete')->name('company-delete');
	Route::post('company/{id}/add-employee', 'CompanyController@addEmployee')->name('company-add-employee');


	Route::get('employee','EmployeeController@index')->name('employee');
	Route::post('add-employee', 'EmployeeController@store')->name('new-employee');
	Route::get('employee/{id}/edit', 'EmployeeController@edit')->name('employee-edit');
	Route::post('employee/{id}/edit', 'EmployeeController@update')->name('employee-update');
	Route::post('employee/{id}/delete', 'EmployeeController@delete')->name('employee-delete');
	
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

