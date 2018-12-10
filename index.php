<?php
declare(strict_types=1);
require 'vendor/autoload.php';
use AppBundle\Controller;
$twitterHandlerObject	= new TwitterController();
$response				= $twitterHandlerObject->queryTweets(10, "harry268");
echo "<pre>";
print_r($response);
echo "</pre>";
?>