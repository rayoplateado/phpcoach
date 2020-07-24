<?php


namespace App\Domain\Model\User;

use Exception;

/**
 * Class NameTooShortException
 * @package App\Domain\Model\User
 */
class NameTooShortException extends Exception
{

    protected $message = 'Name should be at least 5 chars long.';
}