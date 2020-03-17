<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'facebook' => [
        'client_id' => '429433204171464',         // Your facebook Client ID
        'client_secret' => '55b8eaf178502719fa6481aa66914331', // Your facebook Client Secret
        'redirect' => 'https://fesal.rmal.com.sa/deal/public/api/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '164282753915-pj7aeji6troc07oeebo1sgs048ue37rh.apps.googleusercontent.com',
        'client_secret' => 'dVc2EuseMJlO4ivoptYAnszy', // Your google Client Secret
        'redirect' =>'https://fesal.rmal.com.sa/deal/public/api/auth/google/callback',
    ],

];
