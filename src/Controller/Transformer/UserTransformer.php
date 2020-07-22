<?php


namespace App\Controller\Transformer;

use Domain\Model\User\User;

/**
 * Class UserTransformer
 *
 */
class UserTransformer
{
    /**
     * @param array $userAsArray
     *
     * @return User
     */
    public static function fromArray(array $userAsArray) : User
    {
        return new User($userAsArray['uid'], $userAsArray['name']);
    }

    /**
     * @param User $user
     * @return array
     */
    public static function toArray(User $user) : array
    {
        return [
            'uid' => $user->getUid(),
            'name' => $user->getName(),
        ];
    }
}