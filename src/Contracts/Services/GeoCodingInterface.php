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
     * @return Collection
     */
    public function geocodeSearch(string $city, string $street = null, string|int $houseNumber = null, string $lang = null): Collection;

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param float|int $radius
     * @return Collection
     */
    public function reverse(float|int $latitude, float|int $longitude, float|int $radius = 10): Collection;

    /**
     * @param float|int $latitude
     * @param float|int $longitude
     * @param string $search
     * @return Collection
     */
    public function discover(float|int $latitude, float|int $longitude, string $search): Collection;

}
