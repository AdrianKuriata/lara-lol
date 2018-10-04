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

    public function providers($options)
    {
        $this->request_type = 'POST';
        $this->name = 'providers';
        $this->post_options = $options;
        return $this;
    }

    public function tournaments($options)
    {
        $this->request_type = 'POST';
        $this->name = 'tournaments';
        $this->post_options = $options;
        return $this;
    }

    public function getCodes($tournamentId, $options, $count)
    {
        //2782 - tc
        $this->options = [
            'tournamentId' => $tournamentId,
            'count' => $count
        ];

        $this->request_type = 'POST';
        $this->name = 'codes';
        $this->post_options = $options;
        return $this;
    }
}
