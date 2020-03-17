<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class NotificationController extends Controller
{
    public function notification(Request $request){
        $fcm['title']=$request->title;
        $fcm['body']= $request->body;
        foreach (User::all() as $key){

            foreach ($key as $kay){

                sendFCM($kay->device_token,$fcm);
            }
        }
            Flash::success('تم ارسال الاشعار بنجاح');

            return back();


    }

}
