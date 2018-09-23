<?php

namespace Devtemple\Laralol\Classes;

use Devtemple\Laralol\Traits\Connector;

/**
 * Summoner endpoint
 */
class Summoner extends Base {
    use Connector;

    /**
     * Construct function which we defining name and type endpoint
     */
    public function __construct()
    {
        $this->name = 'summoners';
        $this->type = 'summoner';
    }

    /**
     * Searching summoner by name
     * @param string $name Summoner name
     * @return object
     */
    public function findByName($name)
    {
        $this->name = $this->name . '/by-name/' . $name;
        return $this;
    }

    /**
     * Searching summoner by account ID
     * @param string $id Summoner account ID
     * @return object
     */
    public function findByAccountId($id)
    {
        $this->name = $this->name . '/by-account/' . $id;
        return $this;
    }

    /**
     * Searching summoner by ID
     * @param string $id Summoner ID
     * @return object
     */
    public function findById($id)
    {
        $this->name = $this->name . '/' . $id;
        return $this;
    }
}
