<?php

namespace Plutuss\HerePlatform\Services;

use Plutuss\HerePlatform\Clients\GeoCodingClientApi;

class ReverseService extends GeoCodingClientApi
{

    /**
     * @param float $latitude
     * @param float $longitude
     * @param float|int $radius
     * @return array
     */
    public function reverseGeocode(float $latitude, float $longitude, float|int $radius = 10): array
    {
        $radiusInMeters = (int) ceil($radius);

        return $this->setOption(
            array_merge(
                [
                    'in' => "circle:{$latitude},{$longitude};r={$radiusInMeters}",
                ],
                $this->params
            ))
            ->reverseGeocodeUrl()
            ->sendGet();
    }

}
