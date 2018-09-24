<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Spectator Facade
 */
class Spectator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'spectator';
    }
}
