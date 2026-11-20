# HERE Geocoding for Laravel

Use HERE Geocoding and Search API v7 from a Laravel application running PHP 8.0 or later.

## Installation

```shell
composer require plutuss/here-coding-geo
```

Get a HERE API key and set it in your Laravel application's `.env` file. [HERE API key instructions](https://docs.here.com/identity-and-access-management/docs/plat-using-apikeys)

```dotenv
HERE_API_KEY=your-api-key
```

The package loads its default configuration automatically. To customize it, publish the configuration file and edit `config/here-platform.php`.

```shell
php artisan vendor:publish --provider="Plutuss\HerePlatform\Providers\GeoCodingServiceProvider"
```

## Usage

```php
use Plutuss\HerePlatform\Facades\GeoCoding;

$addresses = GeoCoding::geocodeSearch('Berlin', 'Invalidenstraße', '116');
$nearbyAddresses = GeoCoding::reverse(52.53086, 13.38469, 50);
$places = GeoCoding::discover(52.53086, 13.38469, 'coffee');
$suggestions = GeoCoding::autocomplete('Berlin Invaliden', 5);

foreach ($addresses as $address) {
    $title = $address->title();
    $postalCode = $address->addressPostalCode();
    $latitude = $address->getNestedValue('position.lat');
}
```

`reverse()` searches within a radius in meters. The default is 10 meters, and fractional values round up to the next whole meter. `autocomplete()` takes an optional result limit that defaults to the configured value of 20.

Each method returns an array of `GeoCodingResponse` objects. A successful search with zero matches returns `[]`. Optional fields can be `null`. House numbers and postal codes are nullable strings, preserving letters and leading zeros.

For unsuccessful HTTP responses, the client throws a Symfony `HttpException` with the upstream status. A 200 response with an invalid results payload throws an `HttpException` with status 502.
