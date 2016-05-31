<?php 

namespace Garrett9\Stattleship;

/**
 * An interface to the StrattleshipClient.
 * 
 * @author garrettshevach@gmail.com
 *
 */
interface IStattleshipClient 
{
    /**
     * Retrieves teams from the API.
     * 
     * @param $page The page of results to retrieve.
     * @param $per_page The number of results to retrieve per page.
     * @return array An array of the results.
     */
    public function getTeams($page = 1, $per_page = 40);
    
    /**
     * Get all teams from the API.
     * 
     * @return array An array of the results.
     */
    public function getAllTeams();
    
    /**
     * Retrieves players from the API.
     * 
     * @param $page The page of results to retrieve.
     * @param $per_page The number of results to retrieve per page.
     * @return \Garrett9\Stattleship\Player[]
     */
    public function getPlayers($page = 1, $per_page = 40);
    
    /**
     * Retrieves active players from the API.
     * 
     * @param number $page The page of the results to retrieve.
     * @param number $per_page The number of results to retrieve per page.
     * @return \Garrett9\Stattleship\Player[]
     */
    public function getActivePlayers($page = 1, $per_page = 40);
    
    /**
     * Get all players from the API.
     * 
     * @return \Garrett9\Stattleship\Player[]
     */
    public function getAllPlayers();
    
    /**
     * Get all active players from the API.
     * 
     * @return \Garrett9\Stattleship\Player[]
     */
    public function getAllActivePlayers();
    
    /**
     * Get a single game instance from the API given it's Slug ID.
     *
     * @param string $slug
     * @return \Garrett9\Stattleship\Game
     */
    public function getGame($slug);
    
    /**
     * Retrieves games from the API.
     * 
     * @param $page The page of results to retrieve.
     * @param $per_page The number of results to retrieve per page.
     * @return array An array of the results.
     */
    public function getGames($page = 1, $per_page = 40);
    
    /**
     * Get all games in the API.
     * 
     * @return array An array of the results.
     */
    public function getAllGames();
    
    /**
     * Get the game logs from the API.
     * 
     * @param number $page The page of results to retrieve.
     * @param number $per_page The number of results to retrieve per page.
     * @param array $params Extra parameters to add to the query.
     * @return \Garrett9\Stattleship\GameLog[]
     */
    public function getGameLogs($page = 1, $per_page = 40, array $params = []);
    
    /**
     * Get all game logs from the API.
     * 
     * @param array $params Extra parameters to add to the query.
     * @return \Garrett9\Stattleship\GameLog[]
     */
    public function getAllGameLogs(array $params = []);
    
    /**
     * Get all game logs from the API that have been for games that have ended.
     * 
     * @param array $params Extra parameters to add to the query.
     * @return \Garrett9\Stattleship\GameLog[]
     */
    public function getAllEndedGameLogs(array $params = []);
    
    /**
     * Get all game logs from the API that are for games that are in progress.
     * 
     * @param array $params Extra parameters to add to the query.
     * @return \Garrett9\Stattleship\GameLog[]
     */
    public function getAllInProgressGameLogs(array $params = []);
    
    /**
     * Retrieve all game logs for a given Game slug.
     * 
     * @param string $slug The slug to retrieve the Game Logs for.
     * @param array $params Extra parameters to add to the query.
     * @return \Garrett9\Stattleship\GameLog[]
     */
    public function getAllGameLogsForGame($game_slug, array $params = []);
    
    /**
     * Returns the URL used for making API requests to Strattleship.
     * 
     * @return string
     */
    public function getUrl();
    
    /**
     * Get the key being used for making API requests.
     * 
     * @return string
     */
    public function getKey();
}