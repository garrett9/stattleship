<?php
namespace Garrett9\Stattleship\Baseball;

use Garrett9\Stattleship\GameLog;

/**
 * A class representation of a Baseball GameLog record retrieved from Stattleship.
 *
 * @author garrettshevach@gmail.com
 *        
 */
class BaseballGameLog extends GameLog
{

    /**
     * The number of at bats for the GameLog.
     *
     * @var number
     */
    protected $at_bats;

    /**
     * The number of times the player was hit by pitch.
     *
     * @var number
     */
    protected $hit_by_pitch;

    /**
     * The number of walks for the GameLog.
     *
     * @var number
     */
    protected $walks;

    /**
     * The number of hits for the GameLog.
     *
     * @var number
     */
    protected $hits;

    /**
     * The number of doubles for the GameLog.
     *
     * @var number
     */
    protected $doubles;

    /**
     * The number of triples for the GameLog.
     *
     * @var number
     */
    protected $triples;

    /**
     * The number of home runs for the GameLog.
     *
     * @var number
     */
    protected $home_runs;

    /**
     * The number of runs for the GameLog.
     *
     * @var number
     */
    protected $runs;

    /**
     * The number of runs batted in for the GameLog.
     *
     * @var number
     */
    protected $runs_batted_in;

    /**
     * The number of stolen bases for the GameLog.
     *
     * @var number
     */
    protected $stolen_bases;

    /**
     * The number of strikeouts for the GameLog.
     *
     * @var number
     */
    protected $strikeouts;
    
    /**
     * Whether or not the player got the win as a pitcher.
     * 
     * @var number
     */
    protected $wins;
    
    /**
     * The number of innings the player has pitched.
     * 
     * @var number
     */
    protected $innings_pitched;
    
    /**
     * The number of earned runs against the pitcher.
     * 
     * @var number
     */
    protected $pitcher_earned_runs;
    
    /**
     * The number of hits against the player as a pitcher.
     * 
     * @var number
     */
    protected $pitcher_hits;
    
    /**
     * The number of strikeouts the player has accumulated as a pitcher.
     * 
     * @var number
     */
    protected $pitcher_strikeouts;
    
    /**
     * The number of walks the player has accumulated as a pitcher.
     * 
     * @var number
     */
    protected $pitcher_walks;
    
    /**
     * The number of batters faced as a pitcher.
     * 
     * @var number
     */
    protected $batters_faced;

    /**
     * Get the number of at bats for the GameLog.
     *
     * @return number
     */
    public function getAtBats()
    {
        return $this->at_bats;
    }

    /**
     * Set the number of at bats for the GameLog.
     *
     * @param number $at_bats            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setAtBats($at_bats)
    {
        $this->at_bats = floatval($at_bats);
        return $this;
    }
    
    /**
     * Get the number of outs for the GameLog.
     * 
     * @return number
     */
    public function getOuts()
    {
        return $this->getAtBats() - $this->getHits();   
    }

    /**
     * Get the number of times the player was hit by a pitch.
     *
     * @return number
     */
    public function getHitByPitch()
    {
        return $this->hit_by_pitch;
    }

    /**
     * Set the number of times the player was hit by a pitch.
     *
     * @param number $hit_by_pitch            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setHitByPitch($hit_by_pitch)
    {
        $this->hit_by_pitch = floatval($hit_by_pitch);
        return $this;
    }

    /**
     * Get the number of walks for the GameLog.
     *
     * @return number
     */
    public function getWalks()
    {
        return $this->walks;
    }

    /**
     * Set the number of walks for the GameLog.
     *
     * @param number $walks            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setWalks($walks)
    {
        $this->walks = floatval($walks);
        return $this;
    }

    /**
     * Get the number of hits for the GameLog.
     *
     * @return number
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set the number of hits for the GameLog.
     *
     * @param number $hits            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setHits($hits)
    {
        $this->hits = floatval($hits);
        return $this;
    }

    /**
     * Get the number of singles for the GameLog.
     *
     * @return number
     */
    public function getSingles()
    {
        return $this->getHits() - ($this->getDoubles() + $this->getTriples() + $this->getHomeRuns());
    }

    /**
     * Get the number of doubles for the GameLog.
     *
     * @return number
     */
    public function getDoubles()
    {
        return $this->doubles;
    }

    /**
     * Set the number of doubles for the GameLog.
     *
     * @param number $doubles            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setDoubles($doubles)
    {
        $this->doubles = floatval($doubles);
        return $this;
    }

    /**
     * Get the number of triples for the GameLog.
     *
     * @return number
     */
    public function getTriples()
    {
        return $this->triples;
    }

    /**
     * Set the number of triples for the GameLog.
     *
     * @param number $triples            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setTriples($triples)
    {
        $this->triples = floatval($triples);
        return $this;
    }

    /**
     * Get the number of home runs for the GameLog.
     *
     * @return number
     */
    public function getHomeRuns()
    {
        return $this->home_runs;
    }

    /**
     * Set the number of home runs for the GameLog.
     *
     * @param number $home_runs            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setHomeRuns($home_runs)
    {
        $this->home_runs = floatval($home_runs);
        return $this;
    }

    /**
     * Get the number of runs for the GameLog.
     *
     * @return number
     */
    public function getRuns()
    {
        return $this->runs;
    }

    /**
     * Set the number of runs for the GameLog.
     *
     * @param number $runs            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setRuns($runs)
    {
        $this->runs = floatval($runs);
        return $this;
    }

    /**
     * Get the number of runs batted in for the GameLog.
     *
     * @return number
     */
    public function getRunsBattedIn()
    {
        return $this->runs_batted_in;
    }

    /**
     * Set the number of runs batted in for the GameLog.
     *
     * @param number $runs_batted_in            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setRunsBattedIn($runs_batted_in)
    {
        $this->runs_batted_in = floatval($runs_batted_in);
        return $this;
    }

    /**
     * Get the number of stolen bases for the GameLog.
     *
     * @return number.
     */
    public function getStolenBases()
    {
        return $this->stolen_bases;
    }

    /**
     * Set the number of stolen bases for the GameLog.
     *
     * @param number $stolen_bases            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setStolenBases($stolen_bases)
    {
        $this->stolen_bases = floatval($stolen_bases);
        return $this;
    }

    /**
     * Get the number of strikeouts for the GameLog.
     *
     * @return number
     */
    public function getStrikeouts()
    {
        return $this->strikeouts;
    }

    /**
     * Set the number of strikeouts for the GameLog.
     *
     * @param number $strikeouts            
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setStrikeouts($strikeouts)
    {
        $this->strikeouts = floatval($strikeouts);
        return $this;
    }

    /**
     * Get if player has won or lost as a pitcher.
     * 
     * @return number
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Set whether or not the player has won or lost as a pitcher.
     * 
     * @param number $wins
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setWins($wins)
    {
        $this->wins = boolval($wins);
        return $this;
    }

    /**
     * Get the number of innings the player has pitched as a pitcher.
     * 
     * @return number
     */
    public function getInningsPitched()
    {
        return $this->innings_pitched;
    }

    /**
     * Set the number of innings the player has pitched as a pitcher.
     * 
     * @param number $innings_pitched
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setInningsPitched($innings_pitched)
    {
        $this->innings_pitched = floatval($innings_pitched);
        return $this;
    }

    /**
     * Get the number of earned runs against the player as a pitcher.
     * 
     * @return number
     */
    public function getPitcherEarnedRuns()
    {
        return $this->pitcher_earned_runs;
    }

    /**
     * Set the number of earned runs against the player as a pitcher.
     * 
     * @param number $pitcher_earned_runs
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setPitcherEarnedRuns($pitcher_earned_runs)
    {
        $this->pitcher_earned_runs = floatval($pitcher_earned_runs);
        return $this;
    }

    /**
     * Get the number of hits against the player as a pitcher.
     * 
     * @return number.
     */
    public function getPitcherHits()
    {
        return $this->pitcher_hits;
    }

    /**
     * Set the number of hits against the player as a pitcher.
     * 
     * @param number $pitcher_hits
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setPitcherHits($pitcher_hits)
    {
        $this->pitcher_hits = floatval($pitcher_hits);
        return $this;
    }

    /**
     * Get the number of strikeouts the player has accumulated as a pitcher.
     * 
     * @return number
     */
    public function getPitcherStrikeouts()
    {
        return $this->pitcher_strikeouts;
    }

    /**
     * Set the number of strikeouts the player has accumulated as a pitcher.
     * 
     * @param number $pitcher_strikeouts
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setPitcherStrikeouts($pitcher_strikeouts)
    {
        $this->pitcher_strikeouts = floatval($pitcher_strikeouts);
        return $this;
    }

    /**
     * Get the number of walks the player has accumulated as a pitcher.
     * 
     * @return number
     */
    public function getPitcherWalks()
    {
        return $this->pitcher_walks;
    }

    /**
     * Set the number of walks the player has accumulated as a pitcher.
     * 
     * @param number $pitcher_walks
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setPitcherWalks($pitcher_walks)
    {
        $this->pitcher_walks = floatval($pitcher_walks);
        return $this;
    }

    /**
     * Get the number of batters faced as a pitcher.
     * 
     * @return number
     */
    public function getBattersFaced()
    {
        return $this->batters_faced;
    }

    /**
     * Set the number of batters faced as a pitcher.
     * 
     * @param number $batters_faced
     * @return \Garrett9\Stattleship\Baseball\BaseballGameLog
     */
    public function setBattersFaced($batters_faced)
    {
        $this->batters_faced = floatval($batters_faced);
        return $this;
    }
}