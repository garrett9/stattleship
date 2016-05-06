<?php
namespace Garrett9\Stattleship\Factories;

use Garrett9\Stattleship\Team;
use Garrett9\Stattleship\Baseball\BaseballTeam;

/**
 *
 * @author garrett
 *        
 */
class TeamFactory implements ITeamFactory
{

    /**
     *
     * {@inheritDoc}
     *
     * @see \Garrett9\Strattleship\Factories\ITeamFactory::createBaseballTeam()
     */
    public function createBaseballTeam($id, $nickname, $location)
    {
        $team = new BaseballTeam();
        $this->loadTeamData($team, $id, $nickname, $location);
    }

    /**
     * Load similar team data to an already instantiated team instance.
     * 
     * @param Team $team The Team instance to load data into.
     * @param string $id The ID of the team.
     * @param string $nickname The nickname of the team.
     * @param string $location The location of the team.
     */
    protected function loadTeamData(Team $team, $id, $nickname, $location)
    {
        $team->setId($id)
            ->setNickname($nickname)
            ->setLocation($location);
    }
}