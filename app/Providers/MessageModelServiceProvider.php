<?php

namespace App\Providers;

use App\Models\Tip;
use App\Observers\MessageObserver;
use Illuminate\Support\ServiceProvider;

class MessageModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        Tip::observe(MessageObserver::class);
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
