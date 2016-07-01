<?php
namespace Garrett9\Stattleship\Football;

use Garrett9\Stattleship\StattleshipClient;
use Garrett9\Stattleship\Football\FootballTeam;
use Garrett9\Stattleship\Football\FootballPlayer;
use Garrett9\Stattleship\Football\FootballGame;
use Garrett9\Stattleship\Football\FootballGameLog;

/**
 * A client for interacting with the Football endpoints of stattleship.
 *
 * @author garrettshevach@gmail.com
 *        
 */
class FootballStattleshipClient extends StattleshipClient implements IFootballStattleshipClient
{
    
    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createTeamFromData()
     */
    protected function createTeamFromData(\stdClass $data)
    {
        return new FootballTeam();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createPlayerFromData()
     */
    protected function createPlayerFromData(\stdClass $data)
    {
        return new FootballPlayer();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createGameFromData()
     */
    protected function createGameFromData(\stdClass $data)
    {
        return new FootballGame();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createGameLogFromData()
     */
    protected function createGameLogFromData(\stdClass $data)
    {
        return (new FootballGameLog())->setRushesYards($data->rushes_yards)
            ->setRushesTouchdowns($data->rushes_touchdowns)
            ->setPassesYardsGross($data->passes_yards_gross)
            ->setPassesTouchdowns($data->passes_touchdowns)
            ->setInterceptionsTotal($data->interceptions_total)
            ->setReceptionsYards($data->receptions_yards)
            ->setReceptionsTotal($data->receptions_total)
            ->setKickoffReturnTouchdowns($data->kickoff_return_touchdowns)
            ->setPuntReturnTouchdowns($data->punt_return_touchdowns)
            ->setFumblesLost($data->fumbles_lost)
            ->setFumblesOwnTouchdowns($data->fumbles_own_touchdowns)
            ->setFieldsGoalsMade($data->field_goals_made)
            ->setExtraPointsMade($data->extra_points_made)
            ->setSacksTotal($data->sacks_total)
            ->setDefenseFumbleRecoveries($data->defense_fumble_recoveries)
            ->setSafeties($data->safeties);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createTeamGameLogFromData()
     */
    protected function createTeamGameLogFromData(\stdClass $data)
    {
        return (new FootballTeamGameLog())->setFumblesRecoveredDefense($data->fumbles_recovered_defense)
            ->setSafeties($data->safeties);
    }
}