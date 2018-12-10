<?php
namespace AppBundle\Repository;

use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Exception;

/**
 * Class TweetRepositoryAuth gets the auth object for configured credentials.
 */
class TweetRepositoryAuth
{
	const CONSUMER_KEY				= "rTp6FbPdlOtukPe2bVnNg";
	const CONSUMER_SECRET			= "uNq455IXY8A4Udl4CpsmVo7q5vKMxCHhUrZpGYCAyA0";
	const TOKEN						= "95696142-DKaRsnFF9yIwJo9D75DgnyYIOL8jh3A0XLGXOClYD";
	const TOKEN_SECRET				= "NOkGzRRIVj2iSClFegxqEOikgZ8dq6TfUOFW7hvE68dVG";
	
	const TWITTER_TIMELINE_FEED_URL	= "statuses/user_timeline.json?screen_name={user_name}&count={count}";
	
   	/**
	* Twitter api access credentials auth.
	*/
	public static function getAuthconfiguration()
	{
		/*
 		* Setting up the oauth subscriber parameters.
 		*/
		$oauth = new Oauth1([
		    'consumer_key'    => self::CONSUMER_KEY,
		    'consumer_secret' => self::CONSUMER_SECRET,
		    'token'           => self::TOKEN,
		    'token_secret'    => self::TOKEN_SECRET
		]);
		return $oauth;
	}
	
	public static function getTwitterFeedUrlForUser(string $username, int $count)
	{
		return strtr(self::TWITTER_TIMELINE_FEED_URL, array('{user_name}'=>$username, '{count}'=>$count));
	}
}