<?php

return [
    'api_key' => env('LARALOL_API_KEY', null),
    'default_server' => 'eun1',
    'default_season' => 10,
    'api-version' =>[
        'platform' => [
            'champion-rotations' => 3,
            'third-party-code' => 4,
        ],
        'champion-mastery' => 4,
        'league' => 4,
        'status' => 3,
        'match' => 4,
        'spectator' => 4,
        'summoner' => 4,
        'tournament' => 4,
        'tournament-stub' => 4
    ]
];
