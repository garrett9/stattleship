<?php
namespace Garrett9\Stattleship;

use GuzzleHttp\Client;
use Garrett9\Stattleship\Baseball\BaseballStattleshipClient;

/**
 * An abstract class offering the base functionality for all Strattleship Clients.
 *
 * @author garrettshevach@gmail.com
 *        
 */
abstract class StattleshipClient implements IStattleshipClient
{

    /**
     * The status for signifying that a Game is in progress.
     *
     * @var string
     */
    const GAME_IN_PROGRESS = 'in_progress';

    /**
     * The status for signifying that a Game is upcoming.
     *
     * @var string
     */
    const GAME_UPCOMING = 'upcoming';

    /**
     * The status for signifying that a Game has ended.
     *
     * @var string
     */
    const GAME_ENDED = 'ended';

    /**
     * The domain of the Strattleship API.
     *
     * @var string
     */
    const DOMAIN = 'https://www.stattleship.com';

    /**
     * The Guzzle Client for the instance.
     *
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * The URL to make requests to.
     *
     * @var string
     */
    private $url;

    /**
     * The API key for making requests.
     *
     * @var string
     */
    private $key;

    /**
     * The Constructor.
     *
     * @param string $key
     *            The authentication key for making API requests.
     */
    public function __construct($key)
    {
        $this->key = $key;
        $this->url = self::DOMAIN;
        switch (get_class($this)) {
            case BaseballStattleshipClient::class:
                $this->url .= '/baseball/mlb/';
                break;
        }
        $this->client = new Client([
            'base_uri' => $this->url,
            'headers' => [
                'Authorization' => 'Token token=' . $this->key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/vnd.stattleship.com; version=1'
            ],
            'timeout' => 30
        ]);
    }

    /**
     * Perform a GET request for the given path.
     *
     * @param string $path
     *            The path to perform a GET request for.
     * @return \stdClass The resulting serialized JSON object returned from the request.
     */
    protected function get($path, array $params = [])
    {
        $response = $this->client->get(ltrim($path, '/'), [
            'query' => $params
        ]);
        return json_decode($response->getBody());
    }

    /**
     * Create a new Team instance from the given data.
     *
     * @param \stdClass $team            
     * @return \Garrett9\Stattleship\Team
     */
    protected abstract function createTeamFromData(\stdClass $data);

    /**
     * Create a new Player instance from the given data.
     *
     * @param \stdClass $player            
     * @return \Garrett9\Stattleship\Player
     */
    protected abstract function createPlayerFromData(\stdClass $data);

    /**
     * Create a new Game instance from the given data.
     *
     * @param \stdClass $game            
     * @param number $season            
     * @return \Garrett9\Stattleship\Game
     */
    protected abstract function createGameFromData(\stdClass $data);

    /**
     * Create a new GameLog instance from the given data.
     *
     * @param \stdClass $game_log            
     * @return \Garrett9\Stattleship\GameLog
     */
    protected abstract function createGameLogFromData(\stdClass $data);

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Strattleship\IStrattleshipClient::getTeams()
     */
    public function getTeams($page = 1, $per_page = 40)
    {
        $teams = [];
        $data = $this->get('teams', [
            'page' => $page,
            'per_page' => $per_page
        ]);
        foreach ($data->teams as $team)
            $teams[] = $this->createTeamFromData($team)
                ->setId($team->id)
                ->setNickname($team->nickname)
                ->setLocation($team->location)
                ->setSlug($team->slug);
        return $teams;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllTeams()
     */
    public function getAllTeams()
    {
        $all_teams = [];
        $page = 1;
        while (true) {
            $teams = $this->getTeams($page);
            if (count($teams) <= 0)
                break;
            $page ++;
            $all_teams = array_merge($all_teams, $teams);
        }
        return $all_teams;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Strattleship\IStrattleshipClient::getPlayers()
     */
    public function getPlayers($page = 1, $per_page = 40)
    {
        $players = [];
        $data = $this->get('players', [
            'page' => $page,
            'per_page' => $per_page
        ]);
        foreach ($data->players as $player)
            $players[] = $this->createPlayerFromData($player)
                ->setId($player->id)
                ->setTeamId($player->team_id)
                ->setFirstName($player->first_name)
                ->setLastName($player->last_name)
                ->setPosition($player->position_abbreviation)
                ->setSlug($player->slug);
        
        return $players;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getActivePlayers()
     */
    public function getActivePlayers($page = 1, $per_page = 40)
    {
        $players = [];
        $data = $this->get('players', [
            'page' => $page,
            'per_page' => $per_page
        ]);
        foreach ($data->players as $player) {
            if ($player->active)
                $players[] = $this->createPlayerFromData($player)
                    ->setId($player->id)
                    ->setTeamId($player->team_id)
                    ->setFirstName($player->first_name)
                    ->setLastName($player->last_name)
                    ->setPosition($player->position_abbreviation)
                    ->setSlug($player->slug);
        }
        
        return $players;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllPlayers()
     */
    public function getAllPlayers()
    {
        $all_players = [];
        $page = 1;
        while (true) {
            $players = $this->getPlayers($page);
            if (count($players) <= 0)
                break;
            $page ++;
            $all_players = array_merge($all_players, $players);
        }
        return $all_players;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllActivePlayers()
     */
    public function getAllActivePlayers()
    {
        $all_players = [];
        $page = 1;
        while (true) {
            $players = $this->getActivePlayers($page);
            if (count($players) <= 0)
                break;
            $page ++;
            $all_players = array_merge($all_players, $players);
        }
        return $all_players;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Stattleship\IStattleshipClient::getGame()
     */
    public function getGame($slug)
    {
        $data = $this->get('games/' . $slug);
        return $this->createGameFromData($data->game)
            ->setSeason(str_replace('mlb-', '', $data->seasons[0]->slug))
            ->setId($data->game->id)
            ->setStartTimestamp($data->game->timestamp)
            ->setStatus($data->game->status)
            ->setSlug($data->game->slug)
            ->setHomeId($data->game->home_team_id)
            ->setAwayId($data->game->away_team_id);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getGames()
     */
    public function getGames($page = 1, $per_page = 40)
    {
        $games = [];
        $data = $this->get('games', [
            'page' => $page,
            'per_page' => $per_page
        ]);
        foreach ($data->games as $game)
            $games[] = $this->createGameFromData($game)
                ->setId($game->id)
                ->setStartTimestamp($game->timestamp)
                ->setStatus($game->status)
                ->setHomeId($game->home_team_id)
                ->setAwayId($game->away_team_id)
                ->setSeason(str_replace('mlb-', '', $data->seasons[0]->slug))
                ->setSlug($game->slug);
        return $games;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllGames()
     */
    public function getAllGames()
    {
        $all_games = [];
        $page = 1;
        while (true) {
            $games = $this->getGames($page);
            if (count($games) <= 0)
                break;
            $page ++;
            $all_games = array_merge($all_games, $games);
        }
        return $all_games;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getGameLogs()
     */
    public function getGameLogs($page = 1, $per_page = 40, array $params = [])
    {
        $params['page'] = $page;
        $params['per_page'] = $per_page;
        $game_logs = [];
        $data = $this->get('game_logs', $params);
        foreach ($data->game_logs as $game_log)
            $game_logs[] = $this->createGameLogFromData($game_log)
                ->setId($game_log->id)
                ->setGameId($game_log->game_id)
                ->setPlayerId($game_log->player_id)
                ->setTeamId($game_log->team_id)
                ->setOpponentId($game_log->opponent_id);
        return $game_logs;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllGameLogs()
     */
    public function getAllGameLogs(array $params = [])
    {
        $all_game_logs = [];
        $page = 1;
        while (true) {
            $game_logs = $this->getGameLogs($page, 40, $params);
            if (count($game_logs) <= 0)
                break;
            $page ++;
            $all_game_logs = array_merge($all_game_logs, $game_logs);
        }
        return $all_game_logs;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllInProgressGameLogs()
     */
    public function getAllInProgressGameLogs(array $params = [])
    {
        $params['status'] = self::GAME_IN_PROGRESS;
        return $this->getAllGameLogs($params);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllEndedGameLogs()
     */
    public function getAllEndedGameLogs(array $params = [])
    {
        $params['status'] = self::GAME_ENDED;
        return $this->getAllGameLogs($params);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllGameLogsForGame()
     */
    public function getAllGameLogsForGame($game_slug, array $params = [])
    {
        $params['game_id'] = $game_slug;
        return $this->getAllGameLogs($params);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Strattleship\IStrattleshipClient::getUrl()
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Strattleship\IStrattleshipClient::getKey()
     */
    public function getKey()
    {
        return $this->key;
    }
}