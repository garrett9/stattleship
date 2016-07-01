<?php
namespace Garrett9\Stattleship\Baseball;

use Garrett9\Stattleship\StattleshipClient;

/**
 * A client for interacting with the Baseball endpoints of stattleship.
 *
 * @author garrettshevach@gmail.com
 *        
 */
class BaseballStattleshipClient extends StattleshipClient implements IBaseballStattleshipClient
{

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createTeamFromData()
     */
    protected function createTeamFromData(\stdClass $data)
    {
        return new BaseballTeam();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createPlayerFromData()
     */
    protected function createPlayerFromData(\stdClass $data)
    {
        return new BaseballPlayer();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createGameFromData()
     */
    protected function createGameFromData(\stdClass $data)
    {
        return new BaseballGame();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createGameLogFromData()
     */
    protected function createGameLogFromData(\stdClass $data)
    {
        return (new BaseballGameLog())->setAtBats($data->at_bats)
            ->setHitByPitch($data->hit_by_pitch)
            ->setWalks($data->walks)
            ->setHits($data->hits)
            ->setDoubles($data->doubles)
            ->setTriples($data->triples)
            ->setHomeRuns($data->home_runs)
            ->setRuns($data->runs)
            ->setRunsBattedIn($data->runs_batted_in)
            ->setStolenBases($data->stolen_bases)
            ->setStrikeouts($data->strikeouts)
            ->setWins($data->wins)
            ->setInningsPitched($data->innings_pitched)
            ->setPitcherEarnedRuns($data->pitcher_earned_runs)
            ->setPitcherHits($data->pitcher_hits)
            ->setPitcherStrikeouts($data->pitcher_strikeouts)
            ->setPitcherWalks($data->pitcher_walks)
            ->setBattersFaced($data->batters_faced);
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Stattleship\StattleshipClient::createTeamGameLogFromData()
     */
    protected function createTeamGameLogFromData(\stdClass $data)
    {
        return new BaseballTeamGameLog();
    }
}