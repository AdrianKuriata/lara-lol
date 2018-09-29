<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Traits\Connector;

use Devtemple\Laralol\Endpoints\Base;

/**
 * League enpoint
 */
class League extends Base {
    use Connector;

    /**
     * @var array $tiers List of available tiers
     * @var array $queues List of available queues
     * @var string $tier Name of tier
     * @var string $queue Name of queue
     */
    protected $tiers, $queues, $tier, $queue;

    /**
     * Construct where we defining type and name endpoint
     */
    public function __construct()
    {
        $this->type = 'league';
        $this->queues = [
            'solo' => 'RANKED_SOLO_5x5',
            'flex' => 'RANKED_FLEX_SR',
            'flextt' => 'RANKED_FLEX_TT'
        ];
        $this->tiers = [
            'chall' => 'challengerleagues',
            'master' => 'masterleagues'
        ];
    }

    /**
     * Returning specified league
     */
    public function league()
    {
        $this->name = $this->tiers[$this->tier] . '/by-queue/' . $this->queues[$this->queue];
        return $this;
    }

    /**
     * Select searched tier from list chall or master
     * @param string $tier Name of searching tier
     */
    public function tier($tier)
    {
        $this->tier = $tier;
        return $this;
    }

    /**
     * Select searched queue from list flex, flextt or solo
     * @param string $queue Name of searching queue
     */
    public function queue($queue)
    {
        $this->queue = $queue;
        return $this;
    }

    /**
     * Find league by league ID
     * @param string $leagueId League ID
     */
    public function findById($leagueId)
    {
        $this->name = 'leagues/' . $leagueId;
        return $this;
    }

    /**
     * Find league by summoner idea
     * @param int $summonerId Summoner ID
     */
    public function findBySummonerId($summonerId)
    {
        $this->name = 'positions/by-summoner/' . $summonerId;
        return $this;
    }
}
