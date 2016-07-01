<?php 

namespace Garrett9\Stattleship;

/**
 * A class representation of a Team GameLog record retrieved from the API.
 * 
 * @author garrettshevach@gmail.com
 *
 */
class TeamGameLog 
{
    /**
     * The ID of the team game log record.
     * 
     * @var number
     */
    protected $id;
    
    /**
     * The ID of the game the game log is for.
     * 
     * @var number
     */
    protected $game_id;
    
    /**
     * The ID of the team that owns the game log.
     * 
     * @var number
     */
    protected $team_id;
    
    /**
     * The opponent ID of the team who owns the game log.
     * 
     * @var number
     */
    protected $opponent_id;

    /**
     * Get the ID of the team game log record.
     * 
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID of the team game log record.
     * 
     * @param number $id
     * @return \Garrett9\Stattleship\TeamGameLog
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the ID of the game the game log is for.
     * 
     * @return number
     */
    public function getGameId()
    {
        return $this->game_id;
    }

    /**
     * Set the ID of the game the game log is for.
     * 
     * @param number $game_id
     * @return \Garrett9\Stattleship\TeamGameLog
     */
    public function setGameId($game_id)
    {
        $this->game_id = $game_id;
        return $this;
    }

    /**
     * Get the ID of the team that owns the game log.
     * 
     * @return number
     */
    public function getTeamId()
    {
        return $this->team_id;
    }

    /**
     * Set the ID of the team that owns the game log.
     * 
     * @param number $team_id
     * @return \Garrett9\Stattleship\TeamGameLog
     */
    public function setTeamId($team_id)
    {
        $this->team_id = $team_id;
        return $this;
    }

    /**
     * Set the ID of the opponent team of the team that owns the game log record.
     * 
     * @return number
     */
    public function getOpponentId()
    {
        return $this->opponent_id;
    }

    /**
     * Set the ID of the opponent team of the team that owns the game log record.
     * 
     * @param number $opponent_id
     * @return \Garrett9\Stattleship\TeamGameLog
     */
    public function setOpponentId($opponent_id)
    {
        $this->opponent_id = $opponent_id;
        return $this;
    }
    
    /**
     * Set overloading.
     * 
     * @param string $name The attribute to set.
     * @param mixed $value The value to set the attribute to.
     */
    public function __set($name, $value)
    {
        $this->$name = is_null($value) ? 0 : $value;
    }
}