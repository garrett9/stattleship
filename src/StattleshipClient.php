<?php 

namespace Garrett9\Stattleship;

use GuzzleHttp\Client;
use Garrett9\Stattleship\Baseball\BaseballStattleshipClient;

/**
 * An abstract class offering the base functionality for all Strattleship Clients.
 * 
 * @author garrettshevach@gmail.com
 *
 */
abstract class StattleshipClient implements IStattleshipClient
{
    /**
     * The domain of the Strattleship API.
     * 
     * @var string
     */
    const DOMAIN = 'https://www.stattleship.com';
    
    /**
     * The Guzzle Client for the instance.
     * 
     * @var \GuzzleHttp\Client
     */
    private $client;
    
    /**
     * The URL to make requests to.
     * 
     * @var string
     */
    private $url;
    
    /**
     * The API key for making requests.
     * 
     * @var string
     */
    private $key;
    
    /**
     * The constructor.
     * 
     * @param Client $client
     */
    public function __construct($key)
    {
        $this->key = $key;
        $this->url = self::DOMAIN;
        switch(get_class($this)) {
            case BaseballStrattleshipClient::class:
                $this->url .= '/baseball/mlb/';
                break;
        }
        $this->client = new Client([
            'base_uri' => $this->url,
            'headers' => [
                'Authorization' => 'Token token=' . $this->key
            ],
            'Content-Type' => 'application/json',
            'Accept' => 'application/vnd.stattleship.com; version=1'
        ]);
    }
    
    /**
     * Perform a GET request for the given path.
     * 
     * @param string $path The path to perform a GET request for.
     * @return \stdClass The resulting serialized JSON object returned from the request.
     */
    protected function get($path) {
        dd($this->url . $path);
        $response = $this->client->get(ltrim($path, '/'));
        return json_encode($response->getBody());
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Strattleship\IStrattleshipClient::getTeams()
     */
    public abstract function getTeams();
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Strattleship\IStrattleshipClient::getPlayers()
     */
    public abstract function getPlayers();
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Strattleship\IStrattleshipClient::getUrl()
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Garrett9\Strattleship\IStrattleshipClient::getKey()
     */
    public function getKey()
    {
        return $this->key;
    }
}