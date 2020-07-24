<?php


namespace App\Domain\Command;


use Domain\Model\User\User;

class PutUser
{
    /**
     * @var User $user
     */

    private $user;

    /**
     * PutUser constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

}