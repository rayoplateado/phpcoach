<?php


namespace Test\Domain\Model\User;

use App\Domain\Model\User\InMemoryUserRepository;
use App\Domain\Model\User\UserRepository;
use React\EventLoop\LoopInterface;

/**
 * Class InMemoryUserRepositoryTest
 */
class InMemoryUserRepositoryTest extends UserRepositoryTest
{
    protected function createEmptyRepository(LoopInterface $loop): UserRepository
    {
        return new InMemoryUserRepository();
    }
}