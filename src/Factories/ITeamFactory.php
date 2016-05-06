<?php 

namespace Garrett9\Stattleship\Factories;

/**
 * An interface to the TeamFactory instance.
 * 
 * @author garrettshevach@gmail.com
 *
 */
interface ITeamFactory {
    
    /**
     * Create a new BaseballTeam instance.
     * 
     * @param string $id The ID of the team.
     * @param string $nickname The team's nickname.
     * @param string $location The location of the team.
     * @return \Garrett9\Strattleship\Baseball\BaseballTeam
     */
    public function createBaseballTeam($id, $nickname, $location);
    
}