# Laralol

This is a Laravel package which let you faster getting data from League of Legends API. It is my first package, if you want, you can open new issues and give me a clues what I can do better. This API now is available only with facades, but I planning let developers use global functions for call endpoints. Now you can install this package with only master branch, if I will end this package, make a tag and will be v1, now is beta.

## Getting Started

Install this package with packagist.

### Installing

Type with you terminal:

```
composer require devtemple/lara-lol
```

### Set API key
Open your *.env* file and set a ``` LARALOL_API_KEY ``` which you can generate on the League of Legends developers API page

### Options
You can export config files:
```
php artisan vendor:publish --tag=laralol-config
```

Default server:
```
default_server
```

Default season:
```
default_season
```

Possible is define server with every new call endpoint with function:

```
server($server)
```

ex.
```
use Devtemple\Laralol\Facades\Champion;

Champion::server('euw1')->get();
```

### How use
League of Legends API giving use some endpoint to get different data from the RIOT servers.

Every call to endpoint require one function:
```
get($fields)
```

If you want, you can set attribute with fields you want get from the call. You can define array with fields or one field. You can set it empty and get all data from the endpoint.

ex.
```
get('field') or get(['field1', 'field2']) or get()
```
List of all fields for specific endpoints you can find on [League of Legends API Full Reference](https://developer.riotgames.com/api-methods/)

#### Champion
Champion endpoint let us get some data about champions. This endpoint don't have any specified for it functions.

ex.
```
use Devtemple\Laralol\Facades\Champion;

Champion::get();
```

#### Champion Mastery
Champion Mastery Endpoint let us get information about masteries champions for specified summoner. We have some functions which we can use for get some data.

This function let us get a scores for specified summoner ID
```
scores($summonerId);
```

This function give us information about scores for every summoner champion by summoner ID
```
masteries($summonerId);
```

This function give us information about scores for specific champion ID and summoner ID
```
masteriesByChampion($summonerId, $championId);
```

ex.
```
use Devtemple\Laralol\Facades\ChampionMastery;

ChampionMastery::scores($summonerId)->get();

or

ChampionMastery::masteries($summonerId)->get();

or

ChampionMastery::masteriesByChampion($summonerId, $championId);
```

#### League
League endpoint give you some data about challenger and masters leagues and leagues for specified summoners. You can do this with some specified functions.

This combination functions let you get information about challenger or master league:
```
tier($tier); // available options: master or chall

queue($queue); // available options: solo (RANKED_SOLO_5x5) or flex (RANKED_FLEX_SR) or flextt (RANKED_FLEX_TT)

league(); // is required to get specified league - check on examples to see how to use it
```

This function let you get league by league ID
```
findById($leagueId);
```

This function let you get leagues for specified summoner ID
```
findBySummonerId($summonerId);
```

ex.
```
use Devtemple\Laralol\Facades\League;

// You can get a challenger or master league for specified queue like this:
League::tier('chall')->queue('solo')->league()->get();

// Get league by league ID
League::findById($leagueId)->get();

// Find all leagues for specified summoner
League::findBySummonerId($summonerId)->get();

```

#### Lol Status
Lol Status endpoint give you information about specified server. This endpoint don't have any specified functions.

ex.
```
use Devtemple\Laralol\Facades\LolStatus;

LolStatus::get();
```

#### Match
Match endpoint give you some data about matches and timelines for specific match. This endpoint have a some specified functions.

Options which you can use is:
- champion
- season
- queue
- beginIndex
- endIndex
- beginTime
- endTime

// Notice: Working with tournament code require specific policy for your API.

```
findByAccountId($accountId); // Receive matches for Account ID

findByMatchId($matchId); // Receive match for Match ID

findByTournamentCode($tournamentCode); // Receive matches by Tournament code

findByMatchIdAndTournamentCode($matchId, $tournamentCode); // Receive match by Match ID and Tournament code

timeline($matchId); // Receive timeline for specific Match ID

// With under function you can filter result you would get. How you can use it you can check in examples
season($season); // Data for specific users
champion($championId); // Data for specific champion ID
queue($queue); // Data for specific queue
beginIndex($beginIndex); // Start data from specific index
endIndex($endIndex); // End data for specific index
beginTime($beginTime); // Start data for specific date (You can define normal format, timestamp or carbon instance)
endTime($endTime); // End data for specific date (You can define normal format, timestamp or carbon instance)

or

options($options); // Array with specific options champion|season|queue|beginIndex|endIndex|beginTime|endTime
```

ex.

```
use Devtemple\Laralol\Facades\Match;

// Get matches for specific account ID
Match::findByAccountId($accountId)->get();

//  Get matches with specific functions options
Match::findByAccountId($accountId)
->season(10)
->beginIndex(10)
->endIndex(110)
->beginTime('12.01.2018' || $timestamp || Carbon::now()->subWeeks(12)) // Date between beginTime and endTime can't be more than one week
->endTime('15.01.2018' || $timestamp || Carbon::now()->subWeeks(12))
->get();

or

Match::findByAccountId($accountId)
->options([
    'season' => 10,
    'beginIndex' => 10,
    'endIndex' => 110
])
->get();
```

#### Spectator
Spectator endpoint give you some information about summoner if he is in game or give you featured games.
You can take information with two specified functions.

This function return for you featured games:
```
featuredGames();
```

This function give you information if user is in game now:
```
findById($summonerId);
```

ex.
```
use Devtemple\Laralol\Facades\Spectator;

Spectator::featuredGames()->get();

or

Spectator::findById($summonerId)->get();
```

#### Summoner
Summoner endpoint let us get data about summoner like a account ID, summoner ID, name or icon ID. This endpoint has some functions which let us get awesome data from League of Legends API.

This functions let us get information about summoner:
```
findByName($name); // by his name

findByAccountId($id); // by his account id

findById($id); // by his ID
```

ex.
```
use Devtemple\Laralol\Facades\Summoner;

Summoner::findByName('Erring')->get();

or

Summoner::findByAccountId(29647586)->get();

or

Summoner::findById(25251096)->get();
```

#### Third Party Code
Third Party Code endpoint return for you third party code defined in the League of Legends Client. You can do this with one specified function.

This function give you third party code for specified summoner:
```
findById($summonerId);
```

ex.
```
use Devtemple\Laralol\Facades\ThirdPartyCode;

ThirdPartyCode::findById($summonerId)->get();
```

#### TOURNAMENT STUB
In progress ...

#### TOURNAMENT
In progress ...

## Built With

* [Guzzle](http://docs.guzzlephp.org/en/stable/) - Guzzle is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services.

## Authors

* **Adrian Kuriata** - *Initial work* - [AdrianKuriata](https://github.com/AdrianKuriata)

See also the list of [contributors](https://github.com/AdrianKuriata/lara-lol/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
