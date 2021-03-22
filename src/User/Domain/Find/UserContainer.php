<?php

namespace SRC\User\Domain\Find;

use SRC\User\Domain\RegisteredUser;

class UserContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredUser $registeredUser)
    {
        $this->data[] = $registeredUser;
    }

    public function getData(): array
    {
        return $this->data;
    }
}