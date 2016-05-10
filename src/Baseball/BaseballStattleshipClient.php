<?php
namespace Garrett9\Stattleship\Baseball;

use Garrett9\Stattleship\StattleshipClient;

/**
 * A client for interacting with the Baseball
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
        $team = new BaseballTeam();
        $this->loadTeamData($team, $data->id, $data->nickname, $data->location);
        return $team;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createPlayerFromData()
     */
    protected function createPlayerFromData(\stdClass $data)
    {
        $player = new BaseballPlayer();
        $this->loadPlayerData($player, $data->id, $data->team_id, $data->first_name, $data->last_name, $data->position_abbreviation);
        return $player;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createGameFromData()
     */
    protected function createGameFromData(\stdClass $data, $season)
    {
        $game = new BaseballGame();
        $this->loadGameData($game, $data->id, $data->timestamp, $data->status, $data->home_team_id, $data->away_team_id, $season);
        return $game;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Stattleship\StattleshipClient::createGameLogFromData()
     */
    protected function createGameLogFromData(\stdClass $data)
    {
        $game_log = new BaseballGameLog();
        $this->loadGameLogData($game_log, $data->id, $data->player_id, $data->game_id, $data->team_id, $data->opponent_id);
        $game_log->setAtBats($data->at_bats)
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
            ->setPitcherWalks($data->pitcher_walks);
        return $game_log;
    }
}