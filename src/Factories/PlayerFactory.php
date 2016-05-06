<?php
namespace Garrett9\Stattleship\Factories;

use Garrett9\Stattleship\Player;
use Garrett9\Stattleship\Baseball\BaseballPlayer;

/**
 * A factory for creating new Player instances.
 *
 * @author garrettshevach@gmail.com
 *        
 */
class PlayerFactory implements IPlayerFactory
{

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Strattleship\Factories\IPlayerFactory::createBaseballPlayer()
     */
    public function createBaseballPlayer($id, $team_id, $first_name, $last_name, $position)
    {
        $player = new BaseballPlayer();
        $this->loadPlayerData($player, $id, $team_id, $first_name, $last_name, $position);
    }

    /**
     * Load player data into an already instantiated Player instance.
     *
     * @param Player $player
     *            The Player instance to load data into.
     * @param string $id
     *            The ID of the player.
     * @param string $team_id
     *            The ID of the team the player belongs to.
     * @param string $first_name
     *            The first name of the player.
     * @param string $last_name
     *            The last name of the player.
     * @param string $position
     *            The position the player plays.
     */
    protected function loadPlayerData(Player $player, $id, $team_id, $first_name, $last_name, $position)
    {
        $player->setId($id)
            ->setTeamId($team_id)
            ->setFirstName($first_name)
            ->setLastName($last_name)
            ->setPosition($position);
    }
}