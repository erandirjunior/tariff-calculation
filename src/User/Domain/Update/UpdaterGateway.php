<?php

namespace SRC\User\Domain\Update;

use SRC\User\Domain\RegisteredUser;

interface UpdaterGateway
{
    public function update(RegisteredUser $registeredUser): bool;

    public function checkIfEmailExists(int $id): bool;

    public function checkIfEmailAreNotInUse(string $email, int $id): bool;
}