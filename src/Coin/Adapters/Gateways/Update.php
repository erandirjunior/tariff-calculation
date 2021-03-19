<?php

namespace SRC\Coin\Adapters\Gateways;

use SRC\Coin\Domain\RegisteredCoin;
use SRC\Coin\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredCoin $registeredCoin): bool
    {
        $id = $registeredCoin->getId();
        $money = $registeredCoin->getMoney();
        $profitMargin = $registeredCoin->getProfitMargin();

        return $this->updateUnit->update($money, $profitMargin, $id);
    }

    public function checkIfCoinExists(int $id): bool
    {
        return $this->updateUnit->checkIfCoinExists($id);
    }

    public function checkIfMoneyAreNotInUse(string $money, int $id): bool
    {
        return $this->updateUnit->checkIfMoneyAreNotInUse($money, $id);
    }
}