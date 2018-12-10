<?php
use AppBundle\Helper\TweetSerializer;
use AppBundle\Repository\GuzzleTweetRepository;
use CoreDomain\UserNotFoundException;

/**
 * Class TwitterController defines methods to access Twitter API.
 */
class TwitterController
{
    /**
     * Retrieves the 'count' latests tweets from a given username.
     * @param $count Count of tweets to be fetched.
     * @param $username Username from who retrieve the tweets.
     *
     * @return JsonResponse
     */
    public function queryTweets(int $count, string $username)
    {
        $arrayRepresentation = [];
        $code = 200;
        $message = "";
        try {
            // Retrieve tweets
            $TweetRepoObj	= new GuzzleTweetRepository();
            $tweets			= $TweetRepoObj->findTweetsByUsername($username, $count);

            // Serialize data and return response
            $arrayRepresentation = TweetSerializer::serializeTweets($tweets);
        } catch (UserNotFoundException $ex) {
            $code = $ex->getCode();
            $message = $ex->getMessage();
        } catch (Exception $ex) {
            $code = $ex->getCode();
            $message = $ex->getMessage();
        }

        $response = array(
            "code" => $code,
            "message" => $message,
            "data" => $arrayRepresentation
        );
        return $response;
    }
}