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
            'timeout' => 10
        ]);
    }

    /**
     * Load similar team data to an already instantiated team instance.
     *
     * @param Team $team
     *            The Team instance to load data into.
     * @param string $id
     *            The ID of the team.
     * @param string $nickname
     *            The nickname of the team.
     * @param string $location
     *            The location of the team.
     */
    protected function loadTeamData(Team $team, $id, $nickname, $location)
    {
        $team->setId($id)
            ->setNickname($nickname)
            ->setLocation($location);
    }

    /**
     * Load player data into an already instantiated Player instance.
     *
     * @param Player $player
     *            The Player instance to load data into.
     * @param string $id
     *            The ID of the player.
     * @param string $team_id
     *            The ID of the team the player belongs to.
     * @param string $first_name
     *            The first name of the player.
     * @param string $last_name
     *            The last name of the player.
     * @param string $position
     *            The position the player plays.
     */
    protected function loadPlayerData(Player $player, $id, $team_id, $first_name, $last_name, $position)
    {
        $player->setId($id)
            ->setTeamId($team_id)
            ->setFirstName($first_name)
            ->setLastName($last_name)
            ->setPosition($position);
    }

    /**
     * Load game data into an already instantiated game instance.
     *
     * @param Game $game
     *            The game instance to load data into.
     * @param string $id
     *            The game's ID.
     * @param string $start_time
     *            The game's start time.
     * @param string $status
     *            The game's status.
     * @param string $home_id
     *            The team ID of the home team in the game.
     * @param string $away_id
     *            The team ID of the away team in the game.
     * @param integer $season
     *            The season of the game is for.
     */
    protected function loadGameData(Game $game, $id, $start_time, $status, $home_id, $away_id, $season)
    {
        $game->setId($id)
            ->setStartTimestamp($start_time)
            ->setStatus($status)
            ->setHomeId($home_id)
            ->setAwayId($away_id)
            ->setSeason($season);
    }

    /**
     * Loads GameLog data into an already initialized GameLog record.
     *
     * @param GameLog $game_log            
     * @param string $id
     *            The ID of the GameLog.
     * @param string $player_id
     *            The Player ID of the player who owns the GameLog.
     * @param string $game_id
     *            The Game ID the GameLog is for.
     * @param string $team_id
     *            The Team ID the team the GameLog was played for.
     * @param string $opp_id
     *            The Team ID of the team the GameLog was played against.
     */
    protected function loadGameLogData(GameLog $game_log, $id, $player_id, $game_id, $team_id, $opp_id)
    {
        $game_log->setId($id)
            ->setPlayerId($player_id)
            ->setGameId($game_id)
            ->setTeamId($team_id)
            ->setOpponentId($opp_id);
    }

    /**
     * Perform a GET request for the given path.
     *
     * @param string $path
     *            The path to perform a GET request for.
     * @return \stdClass The resulting serialized JSON object returned from the request.
     */
    protected function get($path, array $query_params = [])
    {
        $response = $this->client->get(ltrim($path, '/'), [
            'query' => $query_params
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
    protected abstract function createGameFromData(\stdClass $data, $season);

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
            $teams[] = $this->createTeamFromData($team);
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
            $players[] = $this->createPlayerFromData($player);
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
            $games[] = $this->createGameFromData($game, str_replace('mlb-', '', $data->seasons[0]->slug));
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
    public function getGameLogs($page = 1, $per_page = 40, $status = null)
    {
        $params = [
            'page' => $page,
            'per_page' => $per_page
        ];
        if (! is_null($status))
            $params['status'] = $status;
        
        $game_logs = [];
        $data = $this->get('game_logs', $params);
        foreach ($data->game_logs as $game_log)
            $game_logs[] = $this->createGameLogFromData($game_log);
        return $game_logs;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllGameLogs()
     */
    public function getAllGameLogs($status = null)
    {
        $all_game_logs = [];
        $page = 1;
        while (true) {
            $game_logs = $this->getGameLogs($page, 40, $status);
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
    public function getAllInProgressGameLogs()
    {
        return $this->getAllGameLogs(self::GAME_IN_PROGRESS);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\IStattleshipClient::getAllEndedGameLogs()
     */
    public function getAllEndedGameLogs()
    {
        return $this->getAllGameLogs(self::GAME_ENDED);
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