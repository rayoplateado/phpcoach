<?php

namespace Domain\QueryHandler;

use App\Domain\Model\User\UserRepository;
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
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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

        return $this
            ->userRepository
            ->find($uid);

    }
}