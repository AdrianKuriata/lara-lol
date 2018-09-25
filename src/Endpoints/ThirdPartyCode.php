<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Endpoints\Base;

use Devtemple\Laralol\Traits\Connector;

/**
 * Champion enpoint
 */
class ThirdPartyCode extends Base {
    use Connector;

    /**
     * Construct where we defining type and name endpoint
     */
    public function __construct()
    {
        $this->type = 'platform';
        $this->name = 'third-party-code';
    }

    public function findById($id)
    {
        $this->name = $this->name . '/by-summoner/' . $id;
        return $this;
    }
}
