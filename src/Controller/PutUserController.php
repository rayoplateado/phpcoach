<?php


namespace App\Controller;

use Drift\CommandBus\Bus\CommandBus;
use Symfony\Component\HttpFoundation\Request;

class PutUserController
{
    private $commandBus;
    /**
     * PutUserController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(Request $request, string $uid)
    {


    }

}