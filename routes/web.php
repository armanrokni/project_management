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
use App\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('admin.master.masterpage');
});

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'users'], function(){
        Route::get('insert','UserController@insertView' );
        Route::post('insert', 'UserController@insert');
        Route::get('/','UserController@index');
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('update/{id}', 'UserController@update');
        Route::get('delete/{id}', 'UserController@delete');
      });




    // Routes for chats API
	Route::group([/*'middleware' => 'admin'*/], function() {

		Route::get('chat', 'ChatsController@index');
		Route::get('messages/{id}', 'ChatsController@fetchMessages');


		Route::post('/users', 'ChatsController@users');
		Route::post('seen/{id}', 'ChatsController@seen');
		Route::post('messages', 'ChatsController@sendMessage');
		Route::post('user/{user}/online', 'ChatsController@Online');

	});


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