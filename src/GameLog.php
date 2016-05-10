<?php

namespace Garrett9\Stattleship;

/**
 * A class representation of a GameLog retrieved from the API.
 * 
 * @author garrettshevach@gmail.com
 *
 */
class GameLog 
{
    /**
     * The ID of the GameLog.
     * 
     * @var string
     */
    protected $id;
    
    /**
     * The ID of the game the GameLog is for.
     * 
     * @var string
     */
    protected $game_id;
    
    /**
     * The ID of the player the GameLog is for.
     * 
     * @var string
     */
    protected $player_id;
    
    /**
     * The ID of the team the player having the GameLog played for.
     * 
     * @var string
     */
    protected $team_id;
    
    /**
     * The ID of the opponent team the player played against in the GameLog.
     * 
     * @var string
     */
    protected $opponent_id;

    /**
     * Get the ID of the GameLog.
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID of the GameLog.
     * 
     * @param string $id
     * @return \Garrett9\Stattleship\GameLog
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the Game ID of the GameLog.
     * 
     * @return string
     */
    public function getGameId()
    {
        return $this->game_id;
    }

    /**
     * Set the Game ID of the GameLog.
     * 
     * @param string $game_id
     * @return \Garrett9\Stattleship\GameLog
     */
    public function setGameId($game_id)
    {
        $this->game_id = $game_id;
        return $this;
    }

    /**
     * Get the ID of the player who has the GameLog.
     * 
     * @return string
     */
    public function getPlayerId()
    {
        return $this->player_id;
    }

    /**
     * Set the ID of the player who has the GameLog.
     * 
     * @param string $player_id
     * @return \Garrett9\Stattleship\GameLog
     */
    public function setPlayerId($player_id)
    {
        $this->player_id = $player_id;
        return $this;
    }

    /**
     * Get the ID of the team the player who has the GameLog played for.
     * 
     * @return string
     */
    public function getTeamId()
    {
        return $this->team_id;
    }

    /**
     * Set the ID of the team the player who has the GameLog played for.
     * 
     * @param string $team_id
     * @return \Garrett9\Stattleship\GameLog
     */
    public function setTeamId($team_id)
    {
        $this->team_id = $team_id;
        return $this;
    }

    /**
     * Get the ID of the opponent team the player who has the GameLog played against.
     * 
     * @return string
     */
    public function getOpponentId()
    {
        return $this->opponent_id;
    }

    /**
     * Set the ID of the opponent team the player who has the GameLog played against.
     * 
     * @param string $opponent_id
     * @return \Garrett9\Stattleship\GameLog
     */
    public function setOpponentId($opponent_id)
    {
        $this->opponent_id = $opponent_id;
        return $this;
    }
}