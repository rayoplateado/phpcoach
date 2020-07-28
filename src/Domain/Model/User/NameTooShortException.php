<?php


namespace Domain\Model\User;

use Exception;

/**
 * Class NameTooShortException
 * @package Domain\Model\User
 */
class NameTooShortException extends Exception
{

    protected $message = 'Name should be at least 5 chars long.';
}