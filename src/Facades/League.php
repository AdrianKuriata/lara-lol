<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * League Facade
 */
class League extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'league';
    }
}
