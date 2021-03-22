<?php

namespace SRC\Saller\Adapters\Gateways;

use SRC\Saller\Domain\RegisteredSaller;
use SRC\Saller\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredSaller $registeredSaller): bool
    {
        $id = $registeredSaller->getId();
        $name = $registeredSaller->getName();
        $profitMargin = $registeredSaller->getProfitMargin();

        return $this->updateUnit->update($name, $profitMargin, $id);
    }

    public function checkIfSallerExists(int $id): bool
    {
        return $this->updateUnit->checkIfSallerExists($id);
    }

    public function checkIfNameAreNotInUse(string $name, int $id): bool
    {
        return $this->updateUnit->checkIfNameAreNotInUse($name, $id);
    }
}