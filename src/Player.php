<?php 

namespace Garrett9\Stattleship;

/**
 * A class representation of a Player object retrieved from the API.
 * 
 * @author garrettshevach@gmail.com
 *
 */
abstract class Player {
    
    /**
     * The ID of the player.
     * 
     * @var string
     */
    protected $id;
    
    /**
     * The first name of the player.
     * 
     * @var string
     */
    protected $first_name;
    
    /**
     * The last name of the player.
     * 
     * @var string
     */
    protected $last_name;
    
    /**
     * The position of the player.
     * 
     * @var string
     */
    protected $position;
    
    /**
     * The Team ID of the team the player belongs to.
     * 
     * @var string
     */
    protected $team_id;

    /**
     * Get the Slug of the Player.
     * 
     * @var string
     */
    protected $slug;
    
    /**
     * Get the ID of the player.
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID of the player.
     * 
     * @param string $id
     * @return \Garrett9\Strattleship\Player
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the first name of the player.
     * 
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set the first name of the player.
     * 
     * @param string $first_name
     * @return \Garrett9\Strattleship\Player
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * Get the last name of the player.
     * 
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the last name of the player.
     * 
     * @param string $last_name
     * @return \Garrett9\Strattleship\Player
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Get the position of the player.
     * 
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the position of the player.
     * 
     * @param string $position
     * @return \Garrett9\Strattleship\Player
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get the team of the player.
     * 
     * @return string
     */
    public function getTeamId()
    {
        return $this->team_id;
    }

    /**
     * Set the team of the player.
     * 
     * @param string $team_id
     * @return \Garrett9\Strattleship\Player
     */
    public function setTeamId($team_id)
    {
        $this->team_id = $team_id;
        return $this;
    }

    /**
     * Get the Slug of the player.
     * 
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the Slug of the player.
     * 
     * @param string $slug
     * @return \Garrett9\Stattleship\Player
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }
}