<?php

return [
    'key' => [
        'app_id' => env('HERE_APP_ID', ''),
        'api_key' => env('HERE_API_KEY', ''),
    ],

    'urls' => [
        'geocode_search' => 'https://geocode.search.hereapi.com/v1/geocode',
        'reverse_geocode' => 'https://revgeocode.search.hereapi.com/v1/revgeocode',
        'discover' => 'https://discover.search.hereapi.com/v1/discover',
        'autocomplete' => 'https://autocomplete.search.hereapi.com/v1/autocomplete',
    ],

    'options' => [
        'limit' => 20,
        'lang' => 'en-US',
    ],


];
