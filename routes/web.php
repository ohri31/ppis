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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('equipment', 'EquipmentController');
Route::resource('equipmenttypes', 'EquipmentTypeController');
Route::resource('testrequests', 'TestRequestController');
Route::resource('expectedresults', 'ExpectedResultController');
Route::put('testrequestsdeclined/{id}', 'TestRequestController@declined')->name('testrequests.declined');
Route::put('testrequestsapproved/{id}', 'TestRequestController@approved')->name('testrequests.approved');
Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile']);
Route::put('usersdeclined/{id}', 'UserController@declined')->name('users.declined');
Route::put('usersapproved/{id}', 'UserController@approved')->name('users.approved');
Route::get('/approve', ['as' => 'approve', 'uses' => 'UserController@approve']);

Route::get('testrequests/added', ['as' => 'added', 'uses' => 'TestRequestController@added']);
