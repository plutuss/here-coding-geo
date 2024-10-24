<?php

namespace Plutuss\HerePlatform\Contracts\Response;

interface GeoCodingResponseInterface
{

    /**
     * @param string $path
     * @param mixed $default
     * @return mixed
     */
    public function getNestedValue(string $path, mixed $default = null): mixed;

    /**
     * @param string $key
     * @return bool
     */
    public function hasData(string $key): bool;

}
