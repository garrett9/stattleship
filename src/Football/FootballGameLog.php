<?php
namespace Garrett9\Stattleship\Football;

use Garrett9\Stattleship\GameLog;

/**
 * A class representation of a Baseball GameLog record retrieved from Stattleship.
 *
 * @author garrettshevach@gmail.com
 *        
 */
class FootballGameLog extends GameLog
{
    /**
     * The rushing yards as an offensive player.
     * 
     * @var number
     */
    protected $rushes_yards;
    
    /**
     * The rushing touchdowns as an offensive player.
     * 
     * @var number
     */
    protected $rushes_touchdowns;
    
    /**
     * The gross passing yards as an offensive player.
     * 
     * @var number
     */
    protected $passes_yards_gross;
    
    /**
     * The number of passing touchdowns as an offensive player.
     * 
     * @var number
     */
    protected $passes_touchdowns;
    
    /**
     * The total number of interceptions as an offensive player.
     * 
     * @var number
     */
    protected $interceptions_total;
    
    /**
     * The number of reception yards as an offensive player.
     * 
     * @var number
     */
    protected $receptions_yards;
    
    /**
     * The total number of receptions as an offensive player.
     * 
     * @var number
     */
    protected $receptions_total;
    
    /**
     * The number of return touchdowns off a kickoff.
     * 
     * @var number
     */
    protected $kickoff_return_touchdowns;
    
    /**
     * The number of return touchdowns off a punt.
     * 
     * @var number
     */
    protected $punt_return_touchdowns;
    
    /**
     * The number of fumbles lost.
     * 
     * @var number
     */
    protected $fumbles_lost;
    
    /**
     * The number of fumbles recovered that resulted in a touchdown.
     * 
     * @var number
     */
    protected $fumbles_own_touchdowns;
    
    /**
     * The number of fields goals made.
     * 
     * @var number
     */
    protected $fields_goals_made;
    
    /**
     * The number of extra points made.
     * 
     * @var number
     */
    protected $extra_points_made;
    
    /**
     * The total number of sacks made.
     * 
     * @var number
     */
    protected $sacks_total;
    
    /**
     * The total number of fumbles that the defense recovered.
     * 
     * @var number
     */
    protected $defense_fumble_recoveries;

    /**
     * The total number of safeties as defense.
     * 
     * @var number
     */
    protected $safeties;


    /**
     * Get the number of rushing yards for the game log.
     * 
     * @return number
     */
    public function getRushesYards()
    {
        return $this->rushes_yards;
    }

    /**
     * Set the number of rushing yards for the game log.
     * 
     * @param number $rushes_yards
     */
    public function setRushesYards($rushes_yards)
    {
        $this->rushes_yards = $rushes_yards;
        return $this;
    }

    /**
     * Get the number of rushing touchdowns.
     * 
     * @return number
     */
    public function getRushesTouchdowns()
    {
        return $this->rushes_touchdowns;
    }

    /**
     * Set the number of rushing touchdowns.
     * 
     * @param number $rushes_touchdowns
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setRushesTouchdowns($rushes_touchdowns)
    {
        $this->rushes_touchdowns = $rushes_touchdowns;
        return $this;
    }

    /**
     * Get the number of passing yards.
     * 
     * @return number
     */
    public function getPassesYardsGross()
    {
        return $this->passes_yards_gross;
    }

    /**
     * Set the total number of passing yards.
     * 
     * @param number $passes_yards_gross
     */
    public function setPassesYardsGross($passes_yards_gross)
    {
        $this->passes_yards_gross = $passes_yards_gross;
        return $this;
    }

    /**
     * Get the number of passing touchdowns.
     * 
     * @return number
     */
    public function getPassesTouchdowns()
    {
        return $this->passes_touchdowns;
    }

    /**
     * Set the number of passing touchdowns.
     * 
     * @param number $passes_touchdowns
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setPassesTouchdowns($passes_touchdowns)
    {
        $this->passes_touchdowns = $passes_touchdowns;
        return $this;
    }

    /**
     * Get the total number of interceptions.
     * 
     * @return number
     */
    public function getInterceptionsTotal()
    {
        return $this->interceptions_total;
    }

    /**
     * Set the total number of interceptions.
     * 
     * @param number $interceptions_total
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setInterceptionsTotal($interceptions_total)
    {
        $this->interceptions_total = $interceptions_total;
        return $this;
    }

    /**
     * Get the total number of reception yards.
     * 
     * @return number
     */
    public function getReceptionsYards()
    {
        return $this->receptions_yards;
    }

    /**
     * Set the total number of receptions yards.
     * 
     * @param number $receptions_yards
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setReceptionsYards($receptions_yards)
    {
        $this->receptions_yards = $receptions_yards;
        return $this;
    }

    /**
     * Get the total number of receptions yards.
     * 
     * @return number
     */
    public function getReceptionsTotal()
    {
        return $this->receptions_total;
    }

    /**
     * Set the total number of receptions yards.
     * 
     * @param number $receptions_total
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setReceptionsTotal($receptions_total)
    {
        $this->receptions_total = $receptions_total;
        return $this;
    }

    /**
     * Get the number of returned kickoff.
     * 
     * @return number
     */
    public function getKickoffReturnTouchdowns()
    {
        return $this->kickoff_return_touchdowns;
    }

    /**
     * Set the number of kickoff return touchdowns.
     * 
     * @param number $kickoff_return_touchdowns
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setKickoffReturnTouchdowns($kickoff_return_touchdowns)
    {
        $this->kickoff_return_touchdowns = $kickoff_return_touchdowns;
        return $this;
    }

    /**
     * Get the number of punt returned touchdowns.
     * 
     * @return number
     */
    public function getPuntReturnTouchdowns()
    {
        return $this->punt_return_touchdowns;
    }

    /**
     * Set the number of punt return touchdowns.
     * 
     * @param number $punt_return_touchdowns
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setPuntReturnTouchdowns($punt_return_touchdowns)
    {
        $this->punt_return_touchdowns = $punt_return_touchdowns;
        return $this;
    }

    /**
     * Get the number of fumbles lost.
     * 
     * @return number
     */
    public function getFumblesLost()
    {
        return $this->fumbles_lost;
    }

    /**
     * Set the number of fumbles lost.
     * 
     * @param number $fumbles_lost
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setFumblesLost($fumbles_lost)
    {
        $this->fumbles_lost = $fumbles_lost;
        return $this;
    }

    /**
     * Get the number of touchdowns retrieved from a recovered fumble.
     * 
     * @return number
     */
    public function getFumblesOwnTouchdowns()
    {
        return $this->fumbles_own_touchdowns;
    }

    /**
     * Set the number of touchdowns retrieved from a recovered fumble.
     * 
     * @param number $fumbles_own_touchdowns
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setFumblesOwnTouchdowns($fumbles_own_touchdowns)
    {
        $this->fumbles_own_touchdowns = $fumbles_own_touchdowns;
        return $this;
    }

    /**
     * Get the number of fields goals made.
     * 
     * @return number
     */
    public function getFieldsGoalsMade()
    {
        return $this->fields_goals_made;
    }

    /**
     * Set the number of field goals made.
     * 
     * @param number $fields_goals_made
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setFieldsGoalsMade($fields_goals_made)
    {
        $this->fields_goals_made = $fields_goals_made;
        return $this;
    }

    /**
     * Get the number of extra points made.
     * 
     * @return number
     */
    public function getExtraPointsMade()
    {
        return $this->extra_points_made;
    }

    /**
     * Set the number of extra points made.
     * 
     * @param number $extra_points_made
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setExtraPointsMade($extra_points_made)
    {
        $this->extra_points_made = $extra_points_made;
        return $this;
    }

    /**
     * Get the number of sacks.
     * 
     * @return number
     */
    public function getSacksTotal()
    {
        return $this->sacks_total;
    }

    /**
     * Set the number of sacks.
     * 
     * @param number $sacks_total
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setSacksTotal($sacks_total)
    {
        $this->sacks_total = $sacks_total;
        return $this;
    }

    /**
     * Get the number of defensive fumbles recovered.
     * 
     * @return number
     */
    public function getDefenseFumbleRecoveries()
    {
        return $this->defense_fumble_recoveries;
    }

    /**
     * Set the number of defensive fumbles recovered.
     * 
     * @param number $defense_fumble_recoveries
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setDefenseFumbleRecoveries($defense_fumble_recoveries)
    {
        $this->defense_fumble_recoveries = $defense_fumble_recoveries;
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
     * @return \Garrett9\Stattleship\Football\FootballGameLog
     */
    public function setSafeties($safeties)
    {
        $this->safeties = $safeties;
        return $this;
    }
}