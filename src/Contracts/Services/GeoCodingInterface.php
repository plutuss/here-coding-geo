<?php

namespace Plutuss\HerePlatform\Contracts\Services;

use Illuminate\Support\Collection;

interface GeoCodingInterface
{
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
    ): array;

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param float|int $radius
     * @return array
     */
    public function reverse(float|int $latitude, float|int $longitude, float|int $radius = 10): array;

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param string $search
     * @return array
     */
    public function discover(float|int $latitude, float|int $longitude, string $search): array;


    /**
     * @param string $search
     * @param int|null $limit
     * @return array
     */
    public function autocomplete(string $search, int $limit = null): array;

}
