<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Traits\Connector;

use Devtemple\Laralol\Endpoints\Base;

/**
 * Champion enpoint
 */
class Champion extends Base {
    use Connector;

    /**
     * Construct where we defining type and name endpoint
     */
    public function __construct()
    {
        $this->type = 'platform';
        $this->name = 'champion-rotations';
    }
}
