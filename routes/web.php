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

Auth::routes(['verify' => true]);

// jobs
Route::get('/', 'JobController@index')->name('jobs.index');
Route::get('jobs/{id}/edit', 'JobController@edit')->name('jobs.edit');
Route::post('jobs/{id}/update', 'JobController@update')->name('jobs.update');
Route::get('jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('jobs/create', 'JobController@create')->name('jobs.create');
Route::post('jobs/store', 'JobController@store')->name('jobs.store');
Route::get('jobs/my-jobs', 'JobController@myJobs')->name('jobs.myjobs');
Route::get('jobs/alljobs', 'JobController@allJobs')->name('alljobs');
// job_user
Route::post('applications/{id}', 'JobController@apply')->name('apply');
Route::get('jobs/applicants', 'JobController@applicants')->name('applicants');

//company
Route::get('company/{id}/{company}', 'CompanyController@show')->name('company.show');
Route::get('company/create', 'CompanyController@create')->name('company.view');
Route::post('company/store', 'CompanyController@store')->name('company.store');
Route::post('company/coverphoto', 'CompanyController@coverphoto')->name('cover.photo');
Route::post('company/logo', 'CompanyController@logo')->name('company.logo');

// profile
Route::get('user/profile', 'UserController@index')->name('profile.view');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('profile.coverletter');
Route::post('user/resume', 'UserController@resume')->name('profile.resume');
Route::post('user/avatar', 'UserController@avatar')->name('profile.avatar');

// employer registration
Route::view('employer/register', 'auth.employer-register');
Route::post('employer/register', 'EmployerController@register')->name('employer.register');



Route::get('/home', 'HomeController@index')->name('home');
