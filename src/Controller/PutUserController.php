<?php


namespace App\Controller;

use App\Controller\Transformer\UserTransformer;
use App\Domain\Command\PutUser;
use App\Domain\Model\User\NameTooShortException;
use Drift\CommandBus\Bus\CommandBus;
use React\Promise\PromiseInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @param Request $request
     * @param string $uid
     * @return PromiseInterface
     */
    public function __invoke(Request $request, string $uid) : PromiseInterface
    {
        $body = $request->getContent();
        $userAsArray = json_decode($body, true);
        $user = UserTransformer::fromArray($uid, $userAsArray);
        $putUser = new PutUser($user);

        return $this
            ->commandBus
            ->execute($putUser)
            ->then(function(){
                return new Response('', 202);
            })
            ->otherwise(function(NameTooShortException $e){
                return new Response($e->getMessage(), 400);
            });

    }

}