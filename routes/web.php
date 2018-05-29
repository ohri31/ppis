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
Route::resource('testreports', 'TestReportController');
Route::resource('testcases', 'TestCaseController');
Route::resource('testcasetype', 'TestCaseTypeController');

Route::get('testrequests/{id}/single', 'TestRequestController@single')->name('testrequests.single');
Route::put('testrequestsdeclined/{id}', 'TestRequestController@declined')->name('testrequests.declined');
Route::put('testrequestsapproved/{id}', 'TestRequestController@approved')->name('testrequests.approved');
Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile']);
Route::put('usersdeclined/{id}', 'UserController@declined')->name('users.declined');
Route::put('usersapproved/{id}', 'UserController@approved')->name('users.approved');
Route::get('/approve', ['as' => 'approve', 'uses' => 'UserController@approve']);

Route::put('testreportsdeclined/{id}', 'TestReportController@declined')->name('testreports.declined');
Route::put('testreportsapproved/{id}', 'TestReportController@approved')->name('testreports.approved');
Route::get('testrequests/added', ['as' => 'added', 'uses' => 'TestRequestController@added']);
Route::get('/approvedreports', 'TestReportController@approve')->name('testreports.approve');
Route::get('/approvedrequests', 'TestRequestController@approve')->name('testrequests.approve');

Route::get('bar-chart', 'ChartController@index')->name('chart');;
