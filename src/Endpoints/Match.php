<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Endpoints\Base;

use Devtemple\Laralol\Traits\Connector;

/**
 * Match endpoint
 */
class Match extends Base {
    use Connector;

    /**
     * @var int $champion Champion ID
     * @var int $season Season
     * @var int $queue Queue
     * @var int $beginIndex Begin Index
     * @var int $endIndex End Index
     * @var int|string|object $beginTime  This is a time like a timestamp, string or carbon object
     * @var int|string|object $endTime  This is a time like a timestamp, string or carbon object
     */
    protected $champion, $season, $queue, $beginIndex, $endIndex, $beginTime, $endTime;

    /**
     * Construct function which we defining name and type endpoint
     */
    public function __construct()
    {
        $this->type = 'match';
        $this->request_type = 'GET';
        $this->season = config('laralol.default_season');
    }

    /**
     * Find a matches by account ID
     * @param int $id Account ID
     * @return object Instance
     */
    public function findByAccountId(int $id)
    {
        $this->name = 'matchlists/by-account/' . $id;
        return $this;
    }

    /**
     * Find a match by match ID
     * @param int $matchId Match ID
     * @return object Instance
     */
    public function findByMatchId(int $matchId)
    {
        $this->name = 'matches/' . $matchId;
        return  $this;
    }

    /**
     * Find a match by tournament code, you need remember to has properly policy for your API, if you want
     * this function
     * @param string $tournamentCode Tournament code
     * @return object Instance
     */
    public function findByTournamentCode(string $tournamentCode)
    {
        $this->name = '/matches/by-tournament-code/'. $tournamentCode .'/ids';
        return $this;
    }

    /**
     * Find a match by tournament code, you need remember to has properly policy for your API, if you want
     * this function
     * @param int $matchId Match ID
     * @param string $tournamentCode Tournament code
     * @return object Instance
     */
    public function findByMatchIdAndTournamentCode(int $matchId, string $tournamentCode)
    {
        $this->name = 'matches/'. $matchId .'/by-tournament-code/' . $tournamentCode;
        return $this;
    }

    /**
     * Define season
     * @param int $season Season
     * @return object Instance
     */
    public function season(int $season)
    {
        $this->season = $season;
        return $this;
    }

    /**
     * Define queue
     * @param int $queue Queue
     * @return object Instance
     */
    public function queue(int $queue)
    {
        $this->queue = $queue;
        return $this;
    }

    /**
     * Define champion
     * @param int $championId Champion ID
     * @return object Instance
     */
    public function champion(int $championId)
    {
        $this->champion = $championId;
        return $this;
    }

    /**
     * Begin index filter, something like a LIMIT in SQL
     * @param int $beginIndexId Begin value
     * @return object Instance
     */
    public function beginIndex(int $beginIndexId)
    {
        $this->beginIndex = $beginIndexId;
        return $this;
    }

    /**
     * End index filter, something like a LIMIT in SQL
     * @param int $endIndexId End value
     * @return object Instance
     */
    public function endIndex(int $endIndexId)
    {
        $this->endIndex = $endIndexId;
        return $this;
    }

    /**
     * [This is begin time filter
     * @param int|string|object $beginTime Time format
     * @return object Instance
     */
    public function beginTime($beginTime)
    {
        $this->beginTime = $beginTime;
        return $this;
    }

    /**
     * This is end time filter
     * @param int|string|object $endTime Time format
     * @return object Instance
     */
    public function endTime($endTime)
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * [options description]
     * @param array $options Array with possible options champion|season|queue|beginIndex|endIndex|beginTime|endTime
     * @return object Instance
     */
    public function options(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Get a timeline for specific match
     * @param int $matchId Match ID
     * @return object Instance
     */
    public function timeline(int $matchId)
    {
        $this->name = 'timelines/by-match/' . $matchId;
        return $this;
    }
}
