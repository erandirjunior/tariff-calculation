<?php

namespace SRC\Seller\Domain\Update;

use SRC\Seller\Domain\RegisteredSeller;

interface UpdaterGateway
{
    public function update(RegisteredSeller $registeredSeller): bool;

    public function checkIfSellerExists(int $id): bool;

    public function checkIfNameAreNotInUse(string $name, int $id): bool;
}