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

#expertise controller routes
Route::get('/expertise' , 'ExpertiseController@show');
Route::post('/expertise' , 'ExpertiseController@add');
