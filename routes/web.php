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

// jobs
Route::get('/', 'JobController@index')->name('jobs.index');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');

//company
Route::get('/company/{id}/{company}', 'CompanyController@show')->name('company.show');
Route::get('company/create', 'CompanyController@create')->name('company.view');
Route::post('company/store', 'CompanyController@store')->name('company.store');
Route::post('company/coverphoto', 'CompanyController@coverphoto')->name('cover.photo');

// profile
Route::get('user/profile', 'UserController@index')->name('profile.view');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('profile.coverletter');
Route::post('user/resume', 'UserController@resume')->name('profile.resume');
Route::post('user/avatar', 'UserController@avatar')->name('profile.avatar');

// employer registration
Route::view('employer/register', 'auth.employer-register');
Route::post('employer/register', 'EmployerController@register')->name('employer.register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
