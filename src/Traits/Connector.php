<?php

namespace Devtemple\Laralol\Traits;

use Exception;

use Carbon\Carbon;

use Devtemple\Laralol\Endpoints\Match;

use GuzzleHttp\Client;

trait Connector {
    protected $server;
    protected $type;
    protected $name;
    protected $options;
    protected $optionsKeys = [
        'champion', 'season', 'queue', 'beginIndex', 'endIndex', 'beginTime', 'endTime'
    ];

    public function connect()
    {
        $this->server = $this->server != null? $this->server : config('laralol.default_server');

        $options['query'] = $this->getConvertedOptions();
        $options['base_uri'] = 'https://' . $this->server . '.api.riotgames.com/lol/' . $this->type . '/v3/';
        $options['headers'] = [
            'X-Riot-Token' => config('laralol.api_key')
        ];

        return new Client($options);
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

    private function getConvertedOptions()
    {
        $query = [];

        if (!is_null($this->options)) {
            $this->validateOptions();

            return $this->getEndQuery();
        }

        if (property_exists(new Match, 'champion') && !empty($this->champion)) {
            $query['query'] = [
                'champion' => $this->champion
            ];
        }

        return $query;
    }

    private function validateOptions()
    {
        foreach ($this->options as $key => $row) {
            if (!in_array($key, $this->optionsKeys)) {
                throw new Exception("Key $key doesn't exists.");
            }

            if (in_array($key, ['champion', 'season', 'queue', 'beginIndex', 'endIndex'])) {
                if ($row < 0) {
                    throw new Exception(ucfirst($key) . " value can't be lower than 0.");
                }
            }
        }

        if (isset($this->options['beginIndex']) && isset($this->options['endIndex'])) {
            if ($this->options['endIndex'] < $this->options['beginIndex']) {
                throw new Exception("EndIndex can't be lower than BeginIndex");
            }

            if (($this->options['endIndex'] - $this->options['beginIndex']) > 100) {
                throw new Exception("The maximum range allowed is 100 between BeginIndex and EndIndex");
            }
        }

        return true;
    }

    private function getEndQuery ()
    {
        $query = [];

        foreach ($this->options as $key => $row) {
            if (in_array($key, ['beginTime', 'endTime'])) {
                $query[$key] = $this->getMicroTime($row);
            } else {
                $query[$key] = $row;
            }
        }

        return $query;
    }

    private function getMicroTime($row)
    {
        if (is_string($row)) {
            return Carbon::parse($row)->timestamp * 1000;
        } elseif (is_int($row)) {
            return Carbon::createFromTimestamp($row)->timestamp * 1000;
        } else {
            return $row->timestamp * 1000;
        }
    }
}
