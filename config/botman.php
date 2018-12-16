<?php
return [
    'conversation_cache_time' => 40, // Cache settings
    'user_cache_time' => 30, // Cache settings
    'web' => [
        /*
        |--------------------------------------------------------------------------
        | Web verification
        |--------------------------------------------------------------------------
        |
        | This array will be used to match incoming HTTP requests against your
        | web endpoint, to see if the request should match the web driver.
        |
        */
        'matchingData' => [
            'driver' => 'web',
        ],
    ],
];