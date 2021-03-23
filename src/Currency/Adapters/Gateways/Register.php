<?php

namespace SRC\Currency\Adapters\Gateways;

use SRC\Currency\Domain\Register\Currency;
use SRC\Currency\Domain\Register\RegisterGateway;
use SRC\Currency\Domain\RegisteredCurrency;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Currency $currency): RegisteredCurrency
    {
        $id = $this->registerUnit->register($currency->getCurrency(), $currency->getProfitMargin());
        return new RegisteredCurrency(
            $currency->getCurrency(),
            $currency->getProfitMargin(),
            $id
        );
    }

    public function checkIfCurrencyIsInUse(string $currency): bool
    {
        return $this->registerUnit->checkIfCurrencyIsInUse($currency);
    }
}