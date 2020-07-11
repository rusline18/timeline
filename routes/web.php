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

Route::get('/home/{id?}  ', 'HomeController@index');
Route::get('/report', 'HomeController@report');
Route::get('/projects', 'ProjectController@index');



Route::post('/task', 'TaskController@create');
Route::delete('/task', 'TaskController@delete');
Route::get('/task', 'TaskController@index');

Route::get('/start/{id}', 'TaskController@start')->where('id', '[0-9]+');
Route::post('/stop', 'TaskController@stop');


Route::post('/project', 'ProjectController@create');
Route::put('/project', 'ProjectController@update');
Route::delete('/project', 'ProjectController@delete');
