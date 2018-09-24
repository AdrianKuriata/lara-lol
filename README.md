# Laralol

This is a Laravel package which let you faster getting data from League of Legends API. It is my first package, if you want, you can open new issues and give me a clues what I can do better.

## Getting Started

Just install this package with packagist and let's start.

### Installing

Type with you terminal:

```
composer require devtemple/lara-lol
```

Wait for everything will be installed.

### Set API key
Open your *.env* file and set a ``` LARALOL_API_KEY ``` which you can generate on the League of Legends developers API page

### Options
You can export config files and define which server should be default used for the endpoints API

```
php artisan vendor:publish --tag=laralol-config
```

Possible is define server with every new call endpoint:

```
use Devtemple\Laralol\Facades\Champion;

Champion::server('euw1')->all();
```

### How use

#### Champion
This is a champion endpoint. You can with it get a three possible elements which specific functions.

This is possible with function
```
all()
```
which getting all data from champion endpoint and

```
get($fields)
```
where you can define which fields you want get from endpoint (fields is defined on the full reference API LoL).

ex.
```
use Devtemple\Laralol\Facades\Champion;

Champion::all();
or
Champion::get('freeChampionIds') or Champion::get(['freeChampionIds', 'maxNewPlayerLevel'])
```

#### Summoner
This is Summoner endpoint where we can get summoner information with some additional functions.

We can get information about summoner with his name
```
findByName($name)
```

or by his Account Id
```
findByAccountId($id)
```

or by his ID
```
findById($id)
```

ex.
```
use Devtemple\Laralol\Facades\Summoner;

Summoner::findByName('Erring')->all(); or Summonner::findByName('Erring')->get('summonerLevel'); or Summoner::findByName(['summonerLevel', 'revisionDate']);

or

Summoner::findByAccountId(29647586);

or

Summoner::findById(25251096);
```

#### CHAMPION MASTERY
In progress ...

#### LEAGUE
In progress ...

#### LOL STATUS
This is LolStatus endpoint. With it you can get some information about server.

ex.
```
use Devtemple\Laralol\Facades\LolStatus;

LolStatus::all();

or

LolStatus::get('hostname'); or LolStatus::get(['hostname', 'locales', 'slug']);
```

#### MATCH
In progress ...

#### SPECTATOR
This is Spectator endpoint. With this you can receive featured games or information if user is IN-GAME and receive information about this game.

You can do this with two functions:
```
featuredGames();
```
which let you receive popular games and

```
findById($id);
```
which let you get information if user is in game.

ex.
```
use Devtemple\Laralol\Facades\Spectator;

Spectator::featuredGames()->all(); or Spectator::featuredGames()->get('gameMode'); or Spectator::featuredGames(['gameMode', 'gameId']);

or

Spectator::findById($id)->all(); or Spectator::findById($id)->get('gameId'); or Spectator::findById($id)->get(['gameId', 'gameMode']);
```

#### THIRD PARTY CODE
In progress ...

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
