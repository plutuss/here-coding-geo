<?php

namespace Plutuss\HerePlatform\Facades;

use Illuminate\Support\Facades\Facade;
use Plutuss\HerePlatform\Contracts\Services\GeoCodingInterface;


/**
 * @method static Collection geocodeSearch(string $city,string $street = null,string|int $houseNumber = null,string $lang = null)
 * @method static Collection reverse(float|int $latitude, float|int $longitude, float|int $radius = 10)
 * @method static Collection discover(float|int $latitude, float|int $longitude, string $search)
 * @method static Collection autocomplete(string $search, int $limit = null)
 *
 *
 * @see  GeoCodingInterface
 */
class GeoCoding extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return GeoCodingInterface::class;
    }

}
