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


/* Developed By Ahmed Feisal*/
Route::get('test-broadcast', function(){
//    broadcast(new \App\Events\ExampleEvent);
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([/*'prefix' => 'admin'*/], function () {
    Route::get('/', function () {
        return redirect(route('adminlogin'));
    });
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('adminlogin');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('adminlogout');
//    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('adminregister');
//    Route::post('/register', 'AdminAuth\RegisterController@register');
    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('adminpassword.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('adminpassword.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('adminpassword.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
