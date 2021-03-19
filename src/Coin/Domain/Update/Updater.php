<?php

namespace SRC\Coin\Domain\Update;

use SRC\Coin\Domain\RegisteredCoin;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredCoin $registeredCoin): void
    {
        $id = $registeredCoin->getId();

        if (!$this->updaterGateway->checkIfCoinExists($id)) {
            throw new \InvalidArgumentException('Coin not found!');
        }

        $this->updaterGateway->update($registeredCoin);
    }
}