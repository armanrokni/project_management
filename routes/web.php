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
use App\Libraries\Sms;

Route::group(['middleware' => ['checkLogin', 'checkRole']], function(){
    Route::get('/', 'DashboardController@index');
	});

	Route::group(['prefix' =>'project', 'middleware' => 'checkLogin'], function(){

		Route::get('/','ProjectController@index');
		Route::post('insert','ProjectController@insert');
		Route::get('edit/{id}','ProjectController@edit');
		Route::post('edit','ProjectController@update');
		Route::get('delete/{id}','ProjectController@delete');
		Route::get('info/{id}','ProjectController@showInfo');
		Route::post('user','UserController@insertUserIntoProject');
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



Route::group(['prefix' => 'admin', 'middleware' => ['checkLogin', 'checkRole']], function(){
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

Route::group(['middleware' => 'checkLogin'], function(){
    Route::get('profile', 'ProfileController@index');
    Route::post('/profile/update', 'ProfileController@update');
});

// Auth::routes();

Route::group(['namespace' => 'Auth'],function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');

    Route::get('myLogout', 'LoginController@customLogout')->name('logout');


    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/token/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::get('/home', 'HomeController@index')->name('home');

#technology controller routes
Route::group(['middleware' => ['checkLogin', 'checkRole']], function(){
    Route::get('/technology' , 'TechnologyController@show');
    Route::post('/technology' , 'TechnologyController@add');
    Route::get('/technology/delete/{id}' , 'TechnologyController@delete');
    Route::get('/technology/edit/{id}' , 'TechnologyController@edit');
    Route::post('/technology/update/{id}' , 'TechnologyController@update');
});

#expertise controller routes
Route::group(['middleware' => ['checkLogin', 'checkRole']], function(){
    Route::get('/expertise' , 'ExpertiseController@show');
    Route::post('/expertise' , 'ExpertiseController@add');
    Route::get('/expertise/edit/{id}' , 'ExpertiseController@edit')->where('id', '[0-9]+');
    Route::post('/expertise/update/{id}' , 'ExpertiseController@update')->where('id', '[0-9]+');
    Route::get('/expertise/delete/{id}' , 'ExpertiseController@delete')->where('id', '[0-9]+');
});
