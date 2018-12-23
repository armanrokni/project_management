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
    return view('admin.master.masterpage');
});
#technology controller routes
Route::get('/technology' , 'TechnologyController@show');
Route::post('/technology' , 'TechnologyController@add');
Route::get('/technology/delete/{id}' , 'TechnologyController@delete');
Route::get('/technology/edit/{id}' , 'TechnologyController@edit');
Route::post('/technology/update/{id}' , 'TechnologyController@update');

#expertise controller routes
Route::get('/expertise' , 'ExpertiseController@show');
Route::post('/expertise' , 'ExpertiseController@add');
Route::get('/expertise/edit/{id}' , 'ExpertiseController@edit')->where('id', '[0-9]+');
Route::post('/expertise/update/{id}' , 'ExpertiseController@update')->where('id', '[0-9]+');
Route::get('/expertise/delete/{id}' , 'ExpertiseController@delete')->where('id', '[0-9]+');
