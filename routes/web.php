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
use App\Http\Middleware\CheckLogin;
use Illuminate\Http\Request;
use App\Libraries\Sms;

Route::group(['middleware' => ['checkLogin', 'checkRole']], function(){
    Route::get('/', 'DashboardController@index');
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
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/token/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::get('/home', 'HomeController@index')->name('home');
