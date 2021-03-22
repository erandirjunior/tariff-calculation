<?php

namespace SRC\User\Adapters\Gateways;

use SRC\User\Domain\RegisteredUser;
use SRC\User\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredUser $registeredUser): bool
    {
        $id = $registeredUser->getId();
        $name = $registeredUser->getName();
        $email = $registeredUser->getEmail();

        return $this->updateUnit->update($name, $email, $id);
    }

    public function checkIfEmailExists(int $id): bool
    {
        return $this->updateUnit->checkIfEmailExists($id);
    }

    public function checkIfEmailAreNotInUse(string $email, int $id): bool
    {
        return $this->updateUnit->checkIfEmailAreNotInUse($email, $id);
    }
}