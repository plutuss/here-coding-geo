<?php

namespace Plutuss\HerePlatform\Services;

use Illuminate\Support\Collection;
use Plutuss\HerePlatform\Contracts\Services\GeoCodingInterface;

class GeoCodingService implements GeoCodingInterface
{

    /**
     * @var null|static
     */
    private static $instance = null;

    public static function getInstance(): static
    {
        if (!(static::$instance instanceof static)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param string $city
     * @param string|null $street
     * @param string|int|null $houseNumber
     * @param string|null $lang
     * @return array
     */
    public function geocodeSearch(
        string $city,
        string $street = null,
        string|int $houseNumber = null,
        string $lang = null
    ): array {

        return (new GeocodeSearchService)
            ->search($city, $street, $houseNumber, $lang);

    }

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param float|int $radius
     * @return array
     */
    public function reverse(
        float|int $latitude,
        float|int $longitude,
        float|int $radius = 10

    ): array {

        return (new ReverseService)
            ->reverseGeocode($latitude, $longitude, $radius);
    }

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param string $search
     * @return array
     */
    public function discover(
        float|int $latitude,
        float|int $longitude,
        string $search
    ): array {
        return (new DiscoverService)
            ->discover($latitude, $longitude, $search);

    }

    /**
     * @param string $search
     * @param int|null $limit
     * @return array
     */
    public function autocomplete(
        string $search,
        int $limit = null
    ): array {
        return (new AutocompleteService)
            ->autocomplete($search, $limit);

    }

}
