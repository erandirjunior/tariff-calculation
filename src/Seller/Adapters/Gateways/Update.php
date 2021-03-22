<?php

namespace SRC\Seller\Adapters\Gateways;

use SRC\Seller\Domain\RegisteredSeller;
use SRC\Seller\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredSeller $registeredSeller): bool
    {
        $id = $registeredSeller->getId();
        $name = $registeredSeller->getName();
        $profitMargin = $registeredSeller->getProfitMargin();

        return $this->updateUnit->update($name, $profitMargin, $id);
    }

    public function checkIfSellerExists(int $id): bool
    {
        return $this->updateUnit->checkIfSellerExists($id);
    }

    public function checkIfNameAreNotInUse(string $name, int $id): bool
    {
        return $this->updateUnit->checkIfNameAreNotInUse($name, $id);
    }
}