<?php

namespace Plutuss\HerePlatform\Services;

use Plutuss\HerePlatform\Clients\GeoCodingClientApi;

class GeocodeSearchService extends GeoCodingClientApi
{

    private $lang;

    public function __construct()
    {
        parent::__construct();
        $this->lang = config('here-platform.options.lang');
    }

    public function search(
        string     $city,
        string     $street = null,
        string|int $houseNumber = null,
        string     $lang = null
    )
    {
        return $this->setOption([
            'q' => $city . ' ' . $street . ' ' . $houseNumber,
            'lang' => $lang ?? $this->getLang()
        ])
            ->geocodeSearchUrl()
            ->sendGet();
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

}
