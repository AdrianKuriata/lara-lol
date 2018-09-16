<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

class Summoner extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'summoner';
    }
}
