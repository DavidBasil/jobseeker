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

// profile
Route::get('user/profile', 'UserController@index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('profile.coverletter');
Route::post('user/resume', 'UserController@resume')->name('profile.resume');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
