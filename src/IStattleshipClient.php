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
     * @return array An array of the results.
     */
    public function getTeams();
    
    /**
     * Retrieves players from the API.
     * 
     * @return array An array of the results.
     */
    public function getPlayers();
    
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