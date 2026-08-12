<?php

return [
    'admin' => [
        'email' => env('ADMIN_EMAIL'),
        'name' => env('ADMIN_NAME'),
        'password' => env('ADMIN_PASSWORD'),
    ],

    'invitations' => [
        'ttl_hours' => (int) env('INVITATION_TTL_HOURS', 168),
        'rate_limit_per_minute' => (int) env('INVITATION_RATE_LIMIT', 10),
    ],
];
