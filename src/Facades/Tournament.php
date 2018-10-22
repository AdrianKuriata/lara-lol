<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Tournament Facade
 */
class Tournament extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tournament';
    }
}
