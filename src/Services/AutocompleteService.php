<?php

namespace Plutuss\HerePlatform\Services;

use Illuminate\Support\Collection;
use Plutuss\HerePlatform\Clients\GeoCodingClientApi;

class AutocompleteService extends GeoCodingClientApi
{

    private int $limit;

    public function __construct()
    {
        parent::__construct();

        $this->limit = config('here-platform.options.limit');
    }

    /**
     * @return mixed
     */
    public function getLimit(): mixed
    {
        return $this->limit;
    }

    /**
     * @param string $search
     * @param int|null $limit
     * @return array
     */
    public function autocomplete(string $search, int $limit = null): array
    {
        return $this->setOption(
            array_merge(
                [
                    'q' => $search,
                    'limit' => $limit ?? $this->getLimit()
                ],
                $this->params
            ))
            ->autocompleteUrl()
            ->sendGet();
    }

}
