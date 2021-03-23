<?php

namespace SRC\Currency\Domain\Update;

use SRC\Currency\Domain\RegisteredCurrency;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredCurrency $registeredCurrency): void
    {
        $id = $registeredCurrency->getId();
        $currency = $registeredCurrency->getCurrency();

        if (!$this->updaterGateway->checkIfCurrencyExists($id)) {
            throw new \InvalidArgumentException('Currency not found!');
        }

        if ($this->updaterGateway->checkIfCurrencyAreNotInUse($currency, $id)) {
            throw new \InvalidArgumentException('Currency already be in use!');
        }

        $this->updaterGateway->update($registeredCurrency);
    }
}