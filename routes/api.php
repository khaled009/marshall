<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Developed By Ahmed Feisal*/




//============================================================
Route::group(['middleware' => 'apilang'], function() {
    Route::post('user/register', 'AuthController@register');
    Route::post('register/{type}', 'AuthController@register_type');
    Route::post('login', 'AuthController@authenticate');
    Route::get('terms','SkipController@terms');
    Route::get('about','SkipController@about');
    Route::get('policy','SkipController@policy');
    Route::get('contact','SkipController@contact_us');
    Route::post('forget','AuthController@forget');
    Route::post('reset','AuthController@reset');

    Route::get('bast/players','SkipController@bast_players');
    Route::post('filter/players','SkipController@filter');
    Route::post('player','CoachController@player');
    Route::post('search','UserController@search');

    Route::post('contact','SkipController@contact');
    Route::post('complaint','SkipController@complaint');

    Route::group(['middleware' => ['jwt.auth']], function() {

        Route::post('active', 'AuthController@active');
        Route::post('change/password','AuthController@change_password');

        Route::get('platforms','SkipController@platforms');
        Route::get('platform/{id}','SkipController@platform');

        Route::group(['prefix' => 'user'], function() {
            Route::post('upload/video','UserController@upload_video');
            Route::get('profile','UserController@get_profile');
            Route::post('profile/update','UserController@update_profile');
            Route::get('my/videos','UserController@my_videos');
            Route::get('my/rates','UserController@my_rates');
            Route::post('reupload/video','UserController@reupload_video');
            Route::get('conversation','UserController@chat_store');
            Route::post('message/store','UserController@message_store');
        });
        Route::group(['prefix' => 'coach'], function() {
            Route::post('rate/player','CoachController@rate');
            Route::post('update/profile','CoachController@update');
            Route::post('player/favorite','CoachController@user_favorite');
            Route::get('my/favorites','CoachController@my_favorites');
            Route::post('conversation/store','CoachController@conversation_store');
            Route::post('message/store','CoachController@message_store');
            Route::get('chats','CoachController@chat');

        });

    // ===================== common route
    Route::get('notifications','SkipController@notification');

});
});
