<?php 

namespace Garrett9\Stattleship;

/**
 * A class representation of a Team retrieved from the API.
 * 
 * @author garrettshevach@gmail.com
 */
abstract class Team {
    
    /**
     * The ID of the team.
     * 
     * @var string
     */
    protected $id;
    
    /**
     * The nickname of the team.
     * 
     * @var string
     */
    protected $nickname;
    
    /**
     * The location of the team.
     * 
     * @var string
     */
    protected $location;
    
    /**
     * The acrynom of the team.
     * 
     * @var string
     */
    protected $acrynom;

    /**
     * Get the ID of the team.
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID of the team.
     * 
     * @param string $id
     * @return \Garrett9\Strattleship\Team
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the nickname of the team.
     * 
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set the nickname of the team.
     * 
     * @param string $nickname
     * @return \Garrett9\Strattleship\Team
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * Get the location of the team.
     * 
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the city of the team.
     * 
     * @param string $location
     * @return \Garrett9\Strattleship\Team
     */
    public function setLocation($location)
    {
        $this->location = $location;
        $this->acrynom = strtoupper(substr($this->location, 0, 3));
        return $this;
    }
    
    /**
     * Get the acrynom of the team.
     * 
     * @return string
     */
    public function getAcrynom()
    {
        return $this->acrynom;
    }
}