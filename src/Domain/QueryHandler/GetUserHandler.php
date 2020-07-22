<?php

namespace Domain\QueryHandler;

use Domain\Model\User\UserNotFoundException;
use Domain\Model\User\User;
use Domain\Query\GetUser;
use React\Promise\PromiseInterface;
use function React\Promise\resolve;
use function React\Promise\reject;

/**
 * Class GetUserHandler
 */
class GetUserHandler
{
    /**
     * @var GetUser $getUser
     * 
     * @return PromiseInterface<User>
     * 
     * @throws UserNotFoundException
     */
    public function handle(GetUser $getUser) : PromiseInterface
    {
        $uid = $getUser->getUid();
        $name = 'Engonga';
        if('10' === $uid){
            return reject(new UserNotFoundException());
        }
        return resolve(new User($uid, $name));
    }
}