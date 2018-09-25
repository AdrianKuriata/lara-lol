<?php

namespace Devtemple\Laralol\Facades;

use Illuminate\Support\Facades\Facade;

class ThirdPartyCode extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'third-party-code';
    }
}
