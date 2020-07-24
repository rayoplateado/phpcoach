<?php


namespace App\Domain\Model\User;


use Domain\Model\User\User;
use Domain\Model\User\UserNotFoundException;
use React\Promise\PromiseInterface;

interface UserRepository
{
    /**
     * @param User $user
     * @return PromiseInterface
     */
    public function save(User $user) : PromiseInterface;

    /**
     * @param string $uid
     * @return PromiseInterface<User>
     * @throws UserNotFoundException
     */
    public function find(string $uid) : PromiseInterface;

    /**
     * @param string $uid
     * @return PromiseInterface
     * @throws UserNotFoundException
     */
    public function delete(string $uid) : PromiseInterface;
}