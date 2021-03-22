<?php

namespace SRC\Seller\Domain\Update;

use SRC\Seller\Domain\RegisteredSeller;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredSeller $registeredSeller): void
    {
        $id = $registeredSeller->getId();
        $name = $registeredSeller->getName();

        if (!$this->updaterGateway->checkIfSellerExists($id)) {
            throw new \InvalidArgumentException('Seller not found!');
        }

        if ($this->updaterGateway->checkIfNameAreNotInUse($name, $id)) {
            throw new \InvalidArgumentException('Name already be in use!');
        }

        $this->updaterGateway->update($registeredSeller);
    }
}