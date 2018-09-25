<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Traits\Connector;

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
     * @param int $id Summoner ID
     */
    public function scores(int $id)
    {
        $this->name = 'scores/by-summoner/' . $id;
        return $this;
    }

    /**
     * This function returning champion masteries for specific summoner
     * @param int $id Summoner ID
     */
    public function masteries(int $id)
    {
        $this->name = 'champion-masteries/by-summoner/' . $id;
        return $this;
    }

    /**
     * This function let you get information scores by champion ID for specific summoner
     * @param int $id Summoner ID
     * @param int $championId Champion ID
     */
    public function masteriesByChampion(int $id, int $championId)
    {
        $this->name = 'champion-masteries/by-summoner/' . $id . '/by-champion/' . $championId;
        return $this;
    }
}
