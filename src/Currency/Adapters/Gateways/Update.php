<?php

namespace SRC\Currency\Adapters\Gateways;

use SRC\Currency\Domain\RegisteredCurrency;
use SRC\Currency\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredCurrency $registeredCurrency): bool
    {
        $id = $registeredCurrency->getId();
        $currency = $registeredCurrency->getCurrency();
        $profitMargin = $registeredCurrency->getProfitMargin();

        return $this->updateUnit->update($currency, $profitMargin, $id);
    }

    public function checkIfCurrencyExists(int $id): bool
    {
        return $this->updateUnit->checkIfCurrencyExists($id);
    }

    public function checkIfCurrencyAreNotInUse(string $currency, int $id): bool
    {
        return $this->updateUnit->checkIfCurrencyAreNotInUse($currency, $id);
    }
}