<?php

namespace SRC\Currency\Domain\Update;

use SRC\Currency\Domain\RegisteredCurrency;

interface UpdaterGateway
{
    public function update(RegisteredCurrency $registeredCurrency): bool;

    public function checkIfCurrencyExists(int $id): bool;

    public function checkIfCurrencyAreNotInUse(string $currency, int $id): bool;
}