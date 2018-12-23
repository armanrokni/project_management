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

	Route::prefix('project')->group(function(){

		Route::get('/','ProjectController@index');
		Route::post('insert','ProjectController@insert');
		Route::get('edit/{id}','ProjectController@edit');
		Route::post('edit','ProjectController@update');
		Route::get('delete/{id}','ProjectController@delete');
		Route::get('info/{id}','ProjectController@showInfo');
		Route::post('user','UserController@insert');
		Route::get('user/delete/{project_id}/{user_id}','UserController@deleteUser');
		Route::post('file','FileController@insert');
		Route::get('file/delete/{id}','FileController@delete');
		Route::post('reports','ReportsController@insert');
		Route::get('reports/delete/{id}','ReportsController@delete');
		Route::post('timeLine','timeLineController@insert');
		Route::post('timeLine/users','timeLineController@show');
		Route::get('timeLine/delete/{id}','timeLineController@delete');
		Route::get('timeLine/edit/{id}','timeLineController@finished');


	});

	// Route::prefix('reports')->group(function(){

	// 	Route::get('/','ReportsController@index');
	// 	Route::post('insert','ReportsController@insert');
	// 	Route::get('edit/{id}','ReportsController@edit');
	// 	Route::post('edit','ReportsController@update');
	// 	Route::get('delete/{id}','ReportsController@delete');
		
	// });

	Route::prefix('timeLine')->group(function(){

		Route::get('/','Time_lineController@index');
		Route::post('insert','Time_lineController@insert');
		Route::get('edit/{id}','Time_lineController@edit');
		Route::post('edit','Time_lineController@update');
		Route::get('delete/{id}','Time_lineController@delete');
		
	});
	 
