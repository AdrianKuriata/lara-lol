<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

class Champion extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'champion';
    }
}