<?php

namespace Plutuss\HerePlatform\Response;

use Illuminate\Support\Collection;
use Plutuss\HerePlatform\Contracts\Response\GeoCodingResponseInterface;
use Plutuss\HerePlatform\Contracts\Response\HasParameterInterface;
use Plutuss\HerePlatform\Traits\HasParameter;

/**
 * @method string title()
 */
class GeoCodingResponse implements GeoCodingResponseInterface, HasParameterInterface
{

    use HasParameter;

    public function __construct(
        protected ?Collection $collection
    ) {
        //
    }

    public function __get(string $name)
    {
        return $this->collection->get($name);
    }

    /**
     * @param string $path
     * @param mixed $default
     * @return mixed
     */
    public function getNestedValue(string $path, mixed $default = null): mixed
    {
        return data_get($this->collection, $path, $default);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasData(string $key): bool
    {
        return $this->collection->has($key);
    }


}
