<?php

namespace SRC\Currency\Domain\Register;

use SRC\Currency\Domain\RegisteredCurrency;

interface RegisterGateway
{
    public function register(Currency $currency): RegisteredCurrency;

    public function checkIfCurrencyIsInUse(string $currency): bool;
}