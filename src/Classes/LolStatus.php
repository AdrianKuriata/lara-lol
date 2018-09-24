<?php

namespace Devtemple\Laralol\Classes;

use Devtemple\Laralol\Classes\Base;

use Devtemple\Laralol\Traits\Connector;

/**
 * LolStatus endpoint
 */
class LolStatus extends Base {
    use Connector;

    /**
     * Construct function which we defining name and type endpoint
     */
    public function __construct()
    {
        $this->name = 'shard-data';
        $this->type = 'status';
    }
}
