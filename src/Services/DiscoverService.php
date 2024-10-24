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
     * @return array
     */
    public function discover(float $latitude, float $longitude, string $search): array
    {
        return $this->setOption(
            array_merge(
                [
                    'at' => $latitude . ',' . $longitude,
                    'q' => $search
                ],
                $this->params
            ))
            ->discoverUrl()
            ->sendGet();
    }

}
