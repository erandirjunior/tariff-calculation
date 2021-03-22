<?php

namespace SRC\User\Adapters\Gateways;

use SRC\User\Domain\Register\User;
use SRC\User\Domain\Register\RegisterGateway;
use SRC\User\Domain\RegisteredUser;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(User $user): RegisteredUser
    {
        $id = $this->registerUnit->register($user->getName(), $user->getEmail());
        return new RegisteredUser(
            $user->getName(),
            $user->getEmail(),
            $id
        );
    }

    public function checkIfEmailIsInUse(string $email): bool
    {
        return $this->registerUnit->checkIfEmailIsInUse($email);
    }
}