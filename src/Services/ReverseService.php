<?php

namespace Plutuss\HerePlatform\Services;

use Illuminate\Support\Collection;
use Plutuss\HerePlatform\Clients\GeoCodingClientApi;

class ReverseService extends GeoCodingClientApi
{

    /**
     * @param float $latitude
     * @param float $longitude
     * @param float|int $radius
     * @return Collection
     */
    public function reverseGeocode(float $latitude, float $longitude, float|int $radius = 10)
    {
        return $this->setOption(
            array_merge(
                [
                    'prox' => $latitude . ',' . $longitude . ',' . $radius,
                    'mode' => "retrieveAddresses",
                ],
                $this->params
            ))
            ->reverseGeocodeUrl()
            ->sendGet();
    }

}
