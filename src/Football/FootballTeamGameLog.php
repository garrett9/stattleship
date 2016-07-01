<?php 

namespace Garrett9\Stattleship\Football;

use Garrett9\Stattleship\TeamGameLog;

/**
 * A class representation of a Football TeamGameLog record retrieved from the API.
 * 
 * @author garrettshevach@gmail.com
 *
 */
class FootballTeamGameLog extends TeamGameLog
{
    /**
     * The total number of fumbles that the defense recovered.
     *
     * @var number
     */
    protected $fumbles_recovered_defense;
    
    /**
     * The number of touchdowns achieved on an interception.
     * 
     * @var number
     */
    protected $interception_touchdowns;
    
    /**
     * The number of touchdowns achieved on a kickoff return.
     * 
     * @var number
     */
    protected $kickoff_return_touchdowns;
    
    /**
     * The number of touchdowns achieved on a punt return.
     * 
     * @var number
     */
    protected $punt_return_touchdowns;

    /**
     * The total number of safeties as defense.
     * 
     * @var number
     */
    protected $safeties;
    
    /**
     * The number of defensive interception the team has achieved.
     * 
     * @var number
     */
    protected $interception_returns;

    /**
     * Get the number of defensive fumbles recovered.
     *
     * @return number
     */
    public function getFumblesRecoveredDefense()
    {
        return $this->fumbles_recovered_defense;
    }
    
    /**
     * Set the number of defensive fumbles recovered.
     *
     * @param number $defense_fumble_recoveries
     * @return \Garrett9\Stattleship\Football\FootballTeamGameLog
     */
    public function setFumblesRecoveredDefense($fumbles_recovered_defense)
    {
        $this->fumbles_recovered_defense = $fumbles_recovered_defense;
        return $this;
    }
    
    /**
     * Get the number of safeties.
     *
     * @return number
     */
    public function getSafeties()
    {
        return $this->safeties;
    }
    
    /**
     * Set the number of safeties.
     *
     * @param number $safeties
     * @return \Garrett9\Stattleship\Football\FootballTeamGameLog
     */
    public function setSafeties($safeties)
    {
        $this->safeties = $safeties;
        return $this;
    }
}