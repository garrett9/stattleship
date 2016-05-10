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
     * @return array An array of the results.
     */
    public function getPlayers($page = 1, $per_page = 40);
    
    /**
     * Get all players from the API.
     * 
     * @return array An array of the results.
     */
    public function getAllPlayers();
    
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
     * @param $page The page of results to retrieve.
     * @param $per_page The number of results to retrieve per page.
     * @return array An array of the results.
     */
    public function getGameLogs($page = 1, $per_page = 40, $status = null);
    
    /**
     * Get all game logs from the API.
     * 
     * @return array An array of the results.
     */
    public function getAllGameLogs($status = null);
    
    /**
     * Get all game logs from the API that have been for games that have ended.
     * 
     * @return array An array of the results.
     */
    public function getAllEndedGameLogs();
    
    /**
     * Get all game logs from the API that are for games that are in progress.
     * 
     * @return array An array of the results.
     */
    public function getAllInProgressGameLogs();
    
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