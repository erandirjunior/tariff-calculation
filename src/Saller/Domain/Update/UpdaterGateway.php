<?php

namespace SRC\Saller\Domain\Update;

use SRC\Saller\Domain\RegisteredSaller;

interface UpdaterGateway
{
    public function update(RegisteredSaller $registeredSaller): bool;

    public function checkIfSallerExists(int $id): bool;

    public function checkIfNameAreNotInUse(string $name, int $id): bool;
}