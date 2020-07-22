<?php


namespace App\Domain\Command;


class PutUser
{
    private $uid;
    private $name;
    public function __construct(string $uid, string $name)
    {
        $this->uid = $uid;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}