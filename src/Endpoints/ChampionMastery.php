<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Traits\Connector;

use Devtemple\Laralol\Endpoints\Base;

/**
 * ChampionMastery enpoint
 */
class ChampionMastery extends Base {
    use Connector;

    /**
     * Construct where we defining type and name endpoint
     */
    public function __construct()
    {
        $this->type = 'champion-mastery';
    }

    /**
     * This function returning champion masteries for specific summoner
     * @param int $summonerId Summoner ID
     */
    public function scores(int $summonerId)
    {
        $this->name = 'scores/by-summoner/' . $summonerId;
        return $this;
    }

    /**
     * This function returning champions masteries for specific summoner
     * @param int $summonerId Summoner ID
     */
    public function masteries(int $summonerId)
    {
        $this->name = 'champion-masteries/by-summoner/' . $summonerId;
        return $this;
    }

    /**
     * This function let you get information scores by champion ID for specific summoner
     * @param int $summonerId Summoner ID
     * @param int $championId Champion ID
     */
    public function masteriesByChampion(int $summonerId, int $championId)
    {
        $this->name = 'champion-masteries/by-summoner/' . $summonerId . '/by-champion/' . $championId;
        return $this;
    }
}
