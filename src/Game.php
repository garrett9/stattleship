<?php 

namespace Garrett9\Stattleship;

/**
 * A class representation of a Game instance retrieved from the Stattleship API.
 * 
 * @author garrettshevach@gmail.com
 *
 */
class Game 
{
    /**
     * The ID of the game.
     * 
     * @var string
     */
    protected $id;
    
    /**
     * The ID of the home team in the game.
     * 
     * @var string
     */
    protected $home_id;
    
    /**
     * The ID of the away team in the game.
     * 
     * @var string
     */
    protected $away_id;
    
    /**
     * The status of the game.
     * 
     * @var string
     */
    protected $status;
    
    /**
     * The start time of the game in a unix timestamp.
     * 
     * @var integer
     */
    protected $start_timestamp;
    
    /**
     * The season the game takes place.
     * 
     * @var integer
     */
    protected $season;

    /**
     * Get the ID of the game.
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID of the game.
     * 
     * @param string $id
     * @return \Garrett9\Stattleship\Game
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the ID of the home team in the game.
     * 
     * @return string
     */
    public function getHomeId()
    {
        return $this->home_id;
    }

    /**
     * Set the ID of the home team in the game.
     * 
     * @param string $home_id
     * @return \Garrett9\Stattleship\Game
     */
    public function setHomeId($home_id)
    {
        $this->home_id = $home_id;
        return $this;
    }

    /**
     * Get the ID of the away team in the game.
     * 
     * @return string
     */
    public function getAwayId()
    {
        return $this->away_id;
    }

    /**
     * Set the ID of the away team in the game.
     * 
     * @param string $away_id
     * @return \Garrett9\Stattleship\Game
     */
    public function setAwayId($away_id)
    {
        $this->away_id = $away_id;
        return $this;
    }

    /**
     * Get the status of the game.
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the status of the game.
     * 
     * @param string $status
     * @return \Garrett9\Stattleship\Game
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the start time of the game.
     * 
     * @return number
     */
    public function getStartTimestamp()
    {
        return $this->start_timestamp;
    }

    /**
     * Set the start time of the game.
     * 
     * @param string $start_timestamp
     * @return \Garrett9\Stattleship\Game
     */
    public function setStartTimestamp($start_timestamp)
    {
        $this->start_timestamp = $start_timestamp;
        return $this;
    }

    /**
     * Get the season the game is for.
     * 
     * @return number
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set the season the game is for.
     * 
     * @param number $season
     * @return \Garrett9\Stattleship\Game
     */
    public function setSeason($season)
    {
        $this->season = $season;
        return $this;
    }
    
}