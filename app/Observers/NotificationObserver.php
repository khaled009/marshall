<?php

namespace App\Observers;

use App\Models\Notification;
use App\User;

class NotificationObserver
{
    public function created(Notification $notification)
    {
        if ($receiver = User::where(['id' => $notification['user_id']])->first()) {
            $data = [
                'type' => $notification->type,
                'user_id' => $notification->user_id,
                'title' => $notification->title,
                'body' => $notification->body,
                'click_action'=>"FLUTTER_NOTIFICATION_CLICK"
            ];
            foreach ($receiver->devices as $key){
                sendFCM($key->device_token, $data,'ios');
            }


        }
    }
}
