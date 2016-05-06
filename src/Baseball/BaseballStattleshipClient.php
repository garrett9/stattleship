<?php 

namespace Garrett9\Stattleship\Baseball;

use Garrett9\Stattleship\StattleshipClient;
use Garrett9\Stattleship\Factories\TeamFactory;
use Garrett9\Stattleship\Factories\PlayerFactory;

/**
 * A client for interacting with the Baseball
 * @author garrett
 *
 */
class BaseballStattleshipClient extends StattleshipClient implements IBaseballStattleshipClient
{
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Strattleship\StrattleshipClient::getTeams()
     */
    public function getTeams()
    {
        $team_factory = new TeamFactory();
        $teams = [];
        $data = $this->get('teams');
        foreach($data->teams as $team)
            $teams[] = $team_factory->createBaseballTeam($team->id, $team->nickname, $team->location);
        return $teams;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Strattleship\StrattleshipClient::getPlayers()
     */
    public function getPlayers()
    {
        $player_factory = new PlayerFactory();
        $players = [];
        $data = $this->get('players');
        foreach($data->players as $player)
            $players[] = $player_factory->createBaseballPlayer($player->id, $player->team_id, $player->first_name, $player->last_name, $player->position_abbreviation);
        return $players;
    }
}