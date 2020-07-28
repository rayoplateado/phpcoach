<?php

namespace Test\Domain\Model\User;

use App\Domain\Model\User\UserRepository;
use Domain\Model\User\User;
use Domain\Model\User\UserNotFoundException;
use PHPUnit\Framework\TestCase;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use function Clue\React\Block\await;

abstract class UserRepositoryTest extends TestCase
{
    /**
     * @param LoopInterface $loop
     * @return UserRepository
     */
    abstract protected function createEmptyRepository(LoopInterface $loop) : UserRepository;

    public function testUserNotExist()
    {
        $loop = Factory::create();
        $repository = $this->createEmptyRepository($loop);

        $promise = $repository->find('123');
        $this->expectException(UserNotFoundException::class);
        await($promise, $loop);
    }

    public function testUserExists()
    {
        $loop = Factory::create();
        $repository = $this->createEmptyRepository($loop);

        $promise = $repository
            ->save(new User('123', 'Percebes'))
            ->then(function() use ($repository) {
                return $repository->find('123');
            });

        $user = await($promise, $loop);
        $this->assertEquals('Percebes', $user->getName());
    }

   /* public function testUserTwice()
    {
        $loop = Factory:: create();
        $repository
    }*/

}