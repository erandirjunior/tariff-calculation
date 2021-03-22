<?php

namespace SRC\Saller\Domain\Update;

use SRC\Saller\Domain\RegisteredSaller;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredSaller $registeredSaller): void
    {
        $id = $registeredSaller->getId();
        $name = $registeredSaller->getName();

        if (!$this->updaterGateway->checkIfSallerExists($id)) {
            throw new \InvalidArgumentException('Saller not found!');
        }

        if ($this->updaterGateway->checkIfNameAreNotInUse($name, $id)) {
            throw new \InvalidArgumentException('Money already in use!');
        }

        $this->updaterGateway->update($registeredSaller);
    }
}