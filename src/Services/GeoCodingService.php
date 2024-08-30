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
     * @return Collection
     */
    public function geocodeSearch(
        string $city,
        string $street = null,
        string|int $houseNumber = null,
        string $lang = null
    ): Collection {
        return (new GeocodeSearchService)
            ->search($city, $street, $houseNumber, $lang);
    }

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param float|int $radius
     * @return Collection
     */
    public function reverse(
        float|int $latitude,
        float|int $longitude,
        float|int $radius = 10
    ): Collection {
        return (new ReverseService)
            ->reverseGeocode($latitude, $longitude, $radius);
    }

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param string $search
     * @return Collection
     */
    public function discover(
        float|int $latitude,
        float|int $longitude,
        string $search
    ): Collection {
        return (new DiscoverService)
            ->discover($latitude, $longitude, $search);
    }

    /**
     * @param string $search
     * @param int|null $limit
     * @return Collection
     */
    public function autocomplete(
        string $search,
        int $limit = null
    ): Collection {
        return (new AutocompleteService)
            ->autocomplete($search, $limit);
    }

}
