<?php
namespace AppBundle\Repository;

use CoreDomain\TweetFactory;
use CoreDomain\UserNotFoundException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Exception;

/**
 * Class GuzzleTweetRepository communicates with twitter api and get the data required.
 */
class GuzzleTweetRepository
{
    private $client;

    /**
     * GuzzleTweetRepository constructor.
     */
    public function __construct()
    {
    	$stack	= HandlerStack::create();
		$oauth	= TweetRepositoryAuth::getAuthconfiguration();
		$stack->push($oauth);
		$client = new Client([
    		'base_uri' => 'https://api.twitter.com/1.1/',
    		'handler' => $stack,
            'auth' => 'oauth'
		]);
        $this->client = $client;
    }
    
    /**
    * Retrieves the 'count' latests tweets from a given username.
    */
    public function findTweetsByUsername($username, $count)
    {
        try {
            $body			= $this->client->get('statuses/user_timeline.json?screen_name=' . $username . '&count=' . $count)->getBody();
            $responseArray	= json_decode($body);
            $tweets			= TweetFactory::createTweetsFromArrayObjects($responseArray);
            
            return $tweets;
        } catch (Exception $ex) {
            if ($ex->getCode() == 404) {
                throw new UserNotFoundException($username);
            }
            throw $ex;
        }
    }
}
