<?php

return [
    /*
     * These are the credentials you got from https://dev.twitch.tv/console/apps
     */
    'credentials' => [
        'client_id' => env('TWITCH_CLIENT_ID', 'zeaihat2349le6dc498v1c1uxgomji'),
        'client_secret' => env('TWITCH_CLIENT_SECRET', 't7t2z3mz0jcl2oedvo5pj2hen5bu3m'),
    ],

    /*
     * This package caches queries automatically (for 1 hour per default).
     * Here you can set how long each query should be cached (in seconds).
     *
     * To turn cache off set this value to 0
     */
    'cache_lifetime' => env('IGDB_CACHE_LIFETIME', 3600),

    /*
     * This is the per-page limit for your tier.
     */
    'per_page_limit' => 500,
];
