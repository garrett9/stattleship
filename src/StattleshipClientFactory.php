<?php 

namespace Garrett9\Stattleship;

use Garrett9\Stattleship\Baseball\BaseballStattleshipClient;
use Garrett9\Stattleship\Football\FootballStattleshipClient;
/**
 * A factory class for creating new StattleshipClients.
 * 
 * @author garrettshevach@gmail.com
 *
 */
class StattleshipClientFactory implements IStattleshipClientFactory
{
    /**
     * The API Key to initialize all clients with.
     * 
     * @var string
     */
    protected $key;
    
    /**
     * The constructor.
     * 
     * @param string $key The API key to initialize all clients with.
     */
    public function __construct($key)
    {
        $this->key = $key;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Stattleship\IStattleshipClientFactory::createBaseballClient()
     */
    public function createBaseballClient()
    {
        return new BaseballStattleshipClient($this->key); 
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Stattleship\IStattleshipClientFactory::createFootballClient()
     */
    public function createFootballClient()
    {
        return new FootballStattleshipClient($this->key);
    }
}