<?php

return [
    'key' => [
        'app_id' => env('HERE_APP_ID', ''),
        'api_key' => env('HERE_API_KEY', ''),
    ],

    'urls' => [
        // https://geocode.search.hereapi.com/v1/geocode?q=Invalidenstr+117+Berlin&apiKey=YOUR_API_KEY
        'geocode_search' => 'https://geocode.search.hereapi.com/v1/geocode',
        //  https://revgeocode.search.hereapi.com/v1/revgeocode?at=41.89993%2C12.45447&lang=en-US&apiKey={YOUR_API_KEY}
        'reverse_geocode' => 'https://revgeocode.search.hereapi.com/v1/revgeocode',
        //https://discover.search.hereapi.com/v1/discover?at=52.5228,13.4124&q=petrol+station&apiKey={YOUR_API_KEY}
        'discover' => 'https://discover.search.hereapi.com/v1/discover',
        //  https://autocomplete.search.hereapi.com/v1/ autocomplete  ?q=Frankfurt+Paris &limit=1 &apiKey={YOUR_API_KEY}
        'autocomplete' => 'https://autocomplete.search.hereapi.com/v1/autocomplete',
    ],

    'options' => [
        'limit' => 20,
        'lang' => 'en-US',
    ],


];
