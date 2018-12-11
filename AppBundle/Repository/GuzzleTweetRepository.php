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
    const TWITTER_API_BASE_URL	= "https://api.twitter.com/1.1/";

    private $client;
    /**
    * GuzzleTweetRepository constructor.
    */
    public function __construct()
    {
	   $this->client = $this->initGuzzleClient();
    }

    /**
    * Initialize the guzzle api client for communicating with twitter api.
    */
    private function initGuzzleClient()
    {
	   $stack	= HandlerStack::create();
	   $oauth	= TweetRepositoryAuth::getAuthconfiguration();
	   $stack->push($oauth);
	   return new Client(['base_uri' => self::TWITTER_API_BASE_URL, 'handler' => $stack, 'auth' => 'oauth']);
    }

    /**
    * Retrieves the 'count' latests tweets from a given username.
    */
    public function findTweetsByUsername(string $username, int $count)
    {
        try {
            $twitterFeedUrl	= TweetRepositoryAuth::getTwitterFeedUrlForUser($username, $count);
            $twitterFeed	= $this->client->get($twitterFeedUrl);
            $responseArray	= json_decode($twitterFeed->getBody());
            $tweets			= TweetFactory::createTweetsFromArrayObjects($responseArray);
            return $tweets;
        } catch (Exception $exception) {
            if ($exception->getCode() == 404) {
                throw new UserNotFoundException($username);
            }
            throw $exception;
        }
    }
}