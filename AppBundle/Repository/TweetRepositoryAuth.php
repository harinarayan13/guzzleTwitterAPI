<?php
namespace AppBundle\Repository;

use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Exception;

/**
 * Class TweetRepositoryAuth gets the auth object for configured credentials.
 */
class TweetRepositoryAuth
{
   	/**
	* Twitter api access credentials auth.
	*/
	public static function getAuthconfiguration()
	{
		/*
 		* Setting up the oauth subscriber parameters.
 		*/
		$oauth = new Oauth1([
		    'consumer_key'    => 'rTp6FbPdlOtukPe2bVnNg',
		    'consumer_secret' => 'uNq455IXY8A4Udl4CpsmVo7q5vKMxCHhUrZpGYCAyA0',
		    'token'           => '95696142-DKaRsnFF9yIwJo9D75DgnyYIOL8jh3A0XLGXOClYD',
		    'token_secret'    => 'NOkGzRRIVj2iSClFegxqEOikgZ8dq6TfUOFW7hvE68dVG'
		]);
		return $oauth;
	}
}
