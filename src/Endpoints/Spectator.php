<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Endpoints\Base;

use Devtemple\Laralol\Traits\Connector;

/**
 * Spectator endpoint
 */
class Spectator extends Base {
    use Connector;

    /**
     * Construct function which we defining name and type endpoint
     */
    public function __construct()
    {
        $this->type = 'spectator';
        $this->request_type = 'GET';
    }

    /**
     * This function receiving featuredGames
     */
    public function featuredGames()
    {
        $this->name = 'featured-games';
        return $this;
    }

    /**
     * This function finding by summoner ID his current IN-GAME information
     * @param int $summonerId Summoner ID
     */
    public function findById($summonerId)
    {
        $this->name = 'active-games/by-summoner/' . $summonerId;
        return $this;
    }
}
