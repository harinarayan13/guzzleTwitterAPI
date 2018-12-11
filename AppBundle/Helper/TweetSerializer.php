<?php
namespace AppBundle\Helper;

/**
* Class TweetSerializer is a helper class that serialize tweet object into an array representation.
*/
class TweetSerializer
{
    public static function serializeTweets($tweets)
    {
        $result = [];
        foreach ($tweets as $tweet) {
            $result[] = array(
                "id" => $tweet->getId(),
                "text" => $tweet->getText(),
                "created_at" => $tweet->getCreatedAt()
            );
        }
        return $result;
    }
}