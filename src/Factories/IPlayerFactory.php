<?php 

namespace Garrett9\Stattleship\Factories;

/**
 * An interface to the PlayerFactory.
 * 
 * @author garrettshevach@gmail.com
 *
 */
interface IPlayerFactory 
{
    /**
     * Create a new BaseballPlayer insance.
     * 
     * @param string $id The ID of the Player.
     * @param string $team_id The Team ID of the team the player is on.
     * @param string $first_name The first name of the player.
     * @param string $last_name The last name of the player.
     * @param string $position The position the player plays.
     * @return \Garrett9\Strattleship\Baseball\BaseballPlayer
     */
    public function createBaseballPlayer($id, $team_id, $first_name, $last_name, $position);
}