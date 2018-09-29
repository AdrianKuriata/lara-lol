<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Endpoints\Base;

use Devtemple\Laralol\Traits\Connector;

/**
 * Match endpoint
 */
class Match extends Base {
    use Connector;

    protected $champion, $season, $queue, $beginIndex, $endIndex, $beginTime, $endTime;

    /**
     * Construct function which we defining name and type endpoint
     */
    public function __construct()
    {
        $this->type = 'match';
        $this->season = config('laralol.default_season');
    }

    public function findByAccountId($id)
    {
        $this->name = 'matchlists/by-account/' . $id;
        return $this;
    }

    public function season(int $season)
    {
        $this->season = $season;
        return $this;
    }

    public function queue(int $queue)
    {
        $this->queue = $queue;
        return $this;
    }

    public function champion(int $championId)
    {
        $this->champion = $championId;
        return $this;
    }

    public function options($options)
    {
        $this->options = $options;
        return $this;
    }

    public function timeline($matchId)
    {
        $this->name = 'timelines/by-match/' . $matchId;
        return $this;
    }

    public function findBy($matchId)
    {
        $this->name = 'matches/' . $matchId;
        return  $this;
    }
}
