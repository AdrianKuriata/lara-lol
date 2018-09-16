<?php

namespace Devtemple\Laralol\Classes;

use Devtemple\Laralol\Traits\Connector;

class Champion {
    use Connector;

    public function __construct()
    {
        $this->type = 'platform';
        $this->name = 'champion-rotations';
    }

    public function get()
    {
        return $this->response();
    }

    public function freeChampionIds()
    {
        return $this->response()->freeChampionIds;
    }

    public function freeChampionIdsForNewPlayers()
    {
        return $this->response()->freeChampionIdsForNewPlayers;
    }

    public function maxNewPlayerLevel()
    {
        return $this->response()->maxNewPlayerLevel;
    }
}
