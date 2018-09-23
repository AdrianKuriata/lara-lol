<?php

namespace Devtemple\Laralol\Classes;

use Devtemple\Laralol\Traits\Connector;

class Summoner {
    use Connector;

    public function __construct()
    {
        $this->name = 'summoners';
        $this->type = 'summoner';
    }

    public function all()
    {
        return $this->response();
    }

    public function get($field)
    {
        return $this->response()->{$field};
    }

    public function findByName($name)
    {
        $this->name = $this->name . '/by-name/' . $name;
        return $this;
    }

    public function findByAccountId($id)
    {
        $this->name = $this->name . '/by-account/' . $id;
        return $this;
    }

    public function findById($id)
    {
        $this->name = $this->name . '/' . $id;
        return $this;
    }
}
