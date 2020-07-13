<?php

namespace Devtemple\Laralol\Traits;

use Devtemple\Laralol\Traits\ValidateMatchOptions;

use GuzzleHttp\Client;

/**
 * This is Connector to the LOL API
 */
trait Connector {
    use ValidateMatchOptions;

    /**
     * Required variables
     * @var string
     */
    protected $server, $type, $name, $request_type, $post_options, $version;

    /**
     * Connect function
     * @return object Client instance
     */
    public function connect()
    {
        $this->server = $this->server != null? $this->server : config('laralol.default_server');
        $this->version = config('laralol.api-version');

        $options['query'] = $this->getQueries();
        $options['base_uri'] = 'https://' . $this->server . '.api.riotgames.com/lol/' . $this->type . '/v'.((!is_array($this->version[$this->type]))?$this->version[$this->type]:$this->version[$this->type][$this->name]).'/';
        $options['headers'] = [
            'X-Riot-Token' => config('laralol.api_key')
        ];

        return new Client($options);
    }

    /**
     * Returning reponse from endpoint
     * @return object Body from endpoint
     */
    public function response()
    {
        if (($this->request_type == 'POST' || $this->request_type == 'PUT') && $this->post_options != null) {
            $response = $this->connect()->request($this->request_type, $this->name, [
                'body' => json_encode($this->post_options)
            ]);
        } else {
            $response = $this->connect()->request($this->request_type, $this->name);
        }

        return json_decode($response->getBody());
    }

    /**
     * Specified server
     * @param  string $server Server name
     * @return object Return setted option
     */
    public function server ($server = 'eun1')
    {
        $this->server = $server;
        return $this;
    }
}
