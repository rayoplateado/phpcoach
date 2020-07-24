<?php

namespace Domain\Middleware;


use App\Domain\Command\PutUser;
use App\Domain\Model\User\NameTooShortException;
use Drift\CommandBus\Middleware\DiscriminableMiddleware;
use function React\Promise\reject;

/**
 * Class CheckUserNameLength
 * @package Domain\Middleware
 */

class CheckUserNameLength implements DiscriminableMiddleware
{
    /**
     * @param PutUser $command
     * @param callable $next
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        if(strlen($command->getUser()->getName()) < 5) {
            return reject(new NameTooShortException());
        }

        return $next($command);
    }

    /**
     * @return array
     */
    public function onlyHandle(): array
    {
        return [
            PutUser::class
        ];
    }

}