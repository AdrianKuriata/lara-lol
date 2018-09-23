<?php

namespace Devtemple\Laralol\Traits;

use GuzzleHttp\Client;

trait Connector {
    protected $server;
    protected $type;
    protected $name;

    public function connect()
    {
        $this->server = $this->server != null? $this->server : config('laralol.default_server');

        return new Client([
            'base_uri' => 'https://' . $this->server . '.api.riotgames.com/lol/' . $this->type . '/v3/',
            'headers' => [
                'X-Riot-Token' => config('laralol.api_key')
            ]
        ]);
    }

    public function response()
    {
        $response = $this->connect()->get($this->name);

        return json_decode($response->getBody());
    }

    public function server ($server = 'eun1')
    {
        $this->server = $server;
        return $this;
    }
}
