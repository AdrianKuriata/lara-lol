<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Endpoints\Base;

use Devtemple\Laralol\Traits\Connector;

/**
 * TournamentStub endpoint
 */
class TournamentStub extends Base {
    use Connector;

    /**
     * Construct function which we defining name and type endpoint
     */
    public function __construct()
    {
        $this->type = 'tournament-stub';
        $this->request_type = 'GET';
        $this->server = 'americas';
    }

    /**
     * Creates a tournament provider and returns its ID
     * @param array $options Array with functions, check a full api reference on lol page
     */
    public function providers($options)
    {
        $this->request_type = 'POST';
        $this->name = 'providers';
        $this->post_options = $options;
        return $this;
    }

    /**
     * Creates a tournament and returns its ID
     * @param array $options Array with functions, check a full api reference on lol page
     */
    public function tournaments($options)
    {
        $this->request_type = 'POST';
        $this->name = 'tournaments';
        $this->post_options = $options;
        return $this;
    }

    /**
     * Create a tournament code for the given tournament
     * @param string $tournamentId The tournament ID
     * @param array $options Array with functions, check a full api reference on lol page
     * @param int $count The number of codes to create
     */
    public function postCodes($tournamentId, $options, $count)
    {
        $this->options = [
            'tournamentId' => $tournamentId,
            'count' => $count
        ];

        $this->request_type = 'POST';
        $this->name = 'codes';
        $this->post_options = $options;
        return $this;
    }

    /**
     * Gets a list of lobby events by tournament code
     * @param string $tournamentCode The short code to look up lobby events for
     */
    public function getLobbyEvents($tournamentCode)
    {
        $this->name = 'lobby-events/by-code/' . $tournamentCode;
        return $this;
    }
}
