<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Champion Facade
 */
class Champion extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'champion';
    }
}
