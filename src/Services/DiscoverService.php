<?php

namespace Plutuss\HerePlatform\Services;

use Illuminate\Support\Collection;
use Plutuss\HerePlatform\Clients\GeoCodingClientApi;

class DiscoverService extends GeoCodingClientApi
{

    /**
     * @param float $latitude
     * @param float $longitude
     * @param string $search
     * @return Collection
     */
    public function discover(float $latitude, float $longitude, string $search): Collection
    {
        return $this->setOption([
            'at' => $latitude . ',' . $longitude,
            'q' => $search
        ])
            ->discoverUrl()
            ->sendGet();
    }

}
