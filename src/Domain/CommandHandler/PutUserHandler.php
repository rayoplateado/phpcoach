<?php


namespace Domain\CommandHandler;


use App\Domain\Command\PutUser;
use App\Domain\Model\User\UserRepository;
use React\Promise\PromiseInterface;
use function React\Promise\resolve;

class PutUserHandler
{
    private $userRepository;
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * @param PutUser $putUser
     * @return PromiseInterface
     */
    public function handle(PutUser $putUser) : PromiseInterface
    {
        return $this
            ->userRepository
            ->save($putUser->getUser());
    }
}