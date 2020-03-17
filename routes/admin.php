<?php

//Route::get('/home', function () {
//
////    $school=auth()->user()->name;
////
////    $path=public_path('QR/');
////    $s='ssssssssss'.'.png';
////
////
////    \QrCode::format('png')->size(500)->generate('3', $path.$s);
//    return view('admin.home');
//})->name('home');

/* Developed By Ahmed Feisal*/

Route::get('/home','HomeController@index')->name('home');
Route::resource('settings','SettingController');
Route::resource('admins','AdminController');
Route::resource('players','PlayerController');
Route::resource('platforms','PlatformController');
Route::resource('coaches','CoachController');
Route::resource('agents','CoachController');

Route::get('contact','MessageController@get_contact')->name('contact.index');
Route::get('contact/{id}/show','MessageController@contact_show')->name('contact.show');
Route::delete('contact/{id}/delete','MessageController@contact_delete')->name('contact.destroy');
Route::post('sendmsg','MessageController@sendmsg')->name('contact.sendmsg');

Route::get('send/notification',function(){
    return view('admin.notification.index');
})->name('notification.create');

Route::post('notification','NotificationController@notification')->name('notification.store');

