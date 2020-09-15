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
Route::get('/admin', 'HomeController@admin');
Route::get('/dashdata', 'HomeController@dashData');

Route::get('vehicle/list', 'VehicleController@index');
Route::get('vehicle/list/notmissing', 'VehicleController@indexNotMissing');
Route::post('vehicle/store', 'VehicleController@store');
Route::get('vehicle/edit/{id}', 'VehicleController@edit');
Route::post('vehicle/update', 'VehicleController@update');
Route::delete('vehicle/delete/{id}', 'VehicleController@delete');

Route::post('license/store', 'LicenseController@store');
Route::get('license/list', 'LicenseController@index');
Route::get('license/edit/{id}', 'LicenseController@edit');
Route::post('license/update', 'LicenseController@update');
Route::delete('license/delete/{id}', 'LicenseController@delete');
Route::get('license/violation/{id}', 'LicenseController@violations');


Route::post('violation/store', 'ViolationController@store');
Route::get('violation/list', 'ViolationController@index');
Route::get('violation/edit/{id}', 'ViolationController@edit');
Route::post('violation/update', 'ViolationController@update');
Route::delete('violation/delete/{id}', 'ViolationController@delete');

Route::post('missing/store', 'MissingController@store');
Route::get('missing/list', 'MissingController@index');
Route::get('missing/found/list', 'MissingController@index2');
Route::get('missing/edit/{id}', 'MissingController@edit');
Route::post('missing/update', 'MissingController@update');
Route::post('missing/update/found', 'MissingController@updateFound');
Route::delete('missing/delete/{id}/{vehicle_id}', 'MissingController@delete');

Route::post('violator/store', 'ViolatorController@store');
Route::get('violator/list', 'ViolatorController@index');
Route::get('violator/edit/{id}', 'ViolatorController@edit');
Route::post('violator/update', 'ViolatorController@update');
Route::delete('violator/delete/{id}', 'ViolatorController@delete');

Route::get('violator/scanned/list', 'ViolatorController@indexScanned');
Route::get('violator/scanned/edit/{id}', 'ViolatorController@editScanned');
Route::post('violator/scanned/update', 'ViolatorController@updateScanned');
Route::delete('violator/scanned/delete/{id}', 'ViolatorController@deleteScanned');