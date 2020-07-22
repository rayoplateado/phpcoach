<?php

namespace Domain\Query;

/**
 * Class GetUser
 */
class GetUser
{
    /**
     * @var string
     */
    private $uid;

    /**
     * @param $uid;
     */

    public function __construct(string $uid)
    {
        $this->uid = $uid;
        
    }

    /**
     * @return string
     */

     public function getUid(): string
     {
         return $this->uid;
     }
}