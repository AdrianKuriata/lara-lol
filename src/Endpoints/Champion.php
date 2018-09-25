<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Traits\Connector;

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
