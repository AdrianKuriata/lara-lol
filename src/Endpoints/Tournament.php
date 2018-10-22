<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Facades\TournamentStub;

use Devtemple\Laralol\Traits\Connector;

/**
 * Tournament endpoint
 */
class Tournament extends TournamentStub {
    use Connector;

    /**
     * Construct function which we defining name and type endpoint
     */
    public function __construct()
    {
        $this->type = 'tournament';
        $this->request_type = 'GET';
        $this->server = 'americas';
    }

    /**
     * Update the pick type, map, spectator type, or allowed summoners for a code
     * @param string $tournamentCode Tournament code
     */
    public function putCodes($tournamentCode)
    {
        $this->name = 'codes/' . $tournamentCode;
        $this->request_type = 'PUT';
        return $this;
    }

    /**
     * Returns the tournament code DTO associated with a tournament code string
     * @param string $tournamentCode Tournament code
     */
    public function getCodes($tournamentCode)
    {
        $this->name = 'codes/' . $tournamentCode;
        return $this;
    }
}
