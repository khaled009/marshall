<?php

namespace App\Providers;

use App\Models\Notification;
use App\Observers\NotificationObserver;
use Illuminate\Support\ServiceProvider;

class NotificationModelProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        Notification::observe(NotificationObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
