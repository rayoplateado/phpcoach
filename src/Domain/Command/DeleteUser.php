<?php


namespace Domain\Command;


use Domain\Model\User\User;

class DeleteUser
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
    public function getUid(): User
    {
        return $this->user;
    }

}