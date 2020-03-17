<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAwEfQ62M:APA91bFVWpWmtgL6f9Hu3QcuesoAjw30HWy1-EpYPZ2qYB8NjIrYLClFRryW-tRu50xTsehYrU8_X41dwot22VAJkRX5IUkMJU1mmRawksJbF93xD1wPXHl3RHm5UH7ZhXjQifafMK_I'),
        'sender_id' => env('FCM_SENDER_ID', '825838594915'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
