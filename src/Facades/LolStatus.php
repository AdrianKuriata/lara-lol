<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * LolStatus Facade
 */
class LolStatus extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lol-status';
    }
}
