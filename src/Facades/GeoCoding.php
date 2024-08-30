<?php

namespace Plutuss\HerePlatform\Facades;

use Illuminate\Support\Facades\Facade;

class GeoCoding extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return 'geo.coding.app';
    }

}
