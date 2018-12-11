<?php
namespace CoreDomain;

use Exception;


/**
* Class UserNotFoundException indicates a request can not be done because the specified username do not exists.
*
* @package CoreDomain
*/
class UserNotFoundException extends Exception
{
    public function __construct($username)
    {
        parent::__construct("Username '" . $username . "' was not found !!!");
    }
}