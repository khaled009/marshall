<?php

namespace App\Observers;

use App\Models\Tip;
use App\User;
use LaravelFCM\Tip\OptionsBuilder;
use LaravelFCM\Tip\PayloadDataBuilder;
use LaravelFCM\Tip\PayloadNotificationBuilder;
use FCM;

class MessageObserver
{
    /**
     * Handle the Tip "created" event.
     *
     * @param  \App\Models\Tip  $message
     * @return void
     */
    public function created(Tip $message)
    {

        if ($receiver = User::where(['id' => $message['user_id']])->first()) {

            foreach ($receiver->children as $key){
                $data = [
                    'type' => 'tip',
                    'user_id' => $key->id,
                    'title' => $message->title,
                    'body' => $message->body,
                    'click_action'=>"FLUTTER_NOTIFICATION_CLICK"
                ];
                foreach ($key->devices as $kay){
                    sendFCM($kay->device_token, $data,'ios');

                }
            }



        }
    }



    /**
     * Handle the Tip "updated" event.
     *
     * @param  \App\Models\Tip  $message
     * @return void
     */
    public function updated(Tip $message)
    {
        //
    }

    /**
     * Handle the Tip "deleted" event.
     *
     * @param  \App\Models\Tip  $message
     * @return void
     */
    public function deleted(Tip $message)
    {
        //
    }

    /**
     * Handle the Tip "restored" event.
     *
     * @param  \App\Models\Tip  $message
     * @return void
     */
    public function restored(Tip $message)
    {
        //
    }

    /**
     * Handle the Tip "force deleted" event.
     *
     * @param  \App\Models\Tip  $message
     * @return void
     */
    public function forceDeleted(Tip $message)
    {
        //
    }
}
