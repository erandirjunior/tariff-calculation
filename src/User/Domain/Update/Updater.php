<?php

namespace SRC\User\Domain\Update;

use SRC\User\Domain\RegisteredUser;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredUser $registeredUser): void
    {
        $id = $registeredUser->getId();
        $email = $registeredUser->getEmail();

        if (!$this->updaterGateway->checkIfEmailExists($id)) {
            throw new \InvalidArgumentException('User not found!');
        }

        if ($this->updaterGateway->checkIfEmailAreNotInUse($email, $id)) {
            throw new \InvalidArgumentException('Email already be in use!');
        }

        $this->updaterGateway->update($registeredUser);
    }
}