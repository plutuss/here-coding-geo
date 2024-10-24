<?php

namespace Plutuss\HerePlatform\Services;

use Plutuss\HerePlatform\Clients\GeoCodingClientApi;

class GeocodeSearchService extends GeoCodingClientApi
{

    private string $lang;

    public function __construct()
    {
        parent::__construct();
        $this->lang = config('here-platform.options.lang');
    }

    /**
     * @param string $city
     * @param string|null $street
     * @param string|int|null $houseNumber
     * @param string|null $lang
     * @return array
     */
    public function search(
        string     $city,
        string     $street = null,
        string|int $houseNumber = null,
        string     $lang = null
    ): array
    {

        return $this->setOption(array_merge(
            [
                'q' => $city . ' ' . $street . ' ' . $houseNumber,
                'lang' => $lang ?? $this->getLang()
            ],
            $this->params
        ))
            ->geocodeSearchUrl()
            ->sendGet();
    }

    /**
     * @return mixed
     */
    public function getLang(): mixed
    {
        return $this->lang;
    }

}
