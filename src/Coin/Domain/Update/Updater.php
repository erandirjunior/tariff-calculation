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
        $money = $registeredCoin->getMoney();

        if (!$this->updaterGateway->checkIfCoinExists($id)) {
            throw new \InvalidArgumentException('Coin not found!');
        }

        if ($this->updaterGateway->checkIfMoneyAreNotInUse($money, $id)) {
            throw new \InvalidArgumentException('Money already in use!');
        }

        $this->updaterGateway->update($registeredCoin);
    }
}