<?php

namespace SRC\Currency\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(Currency $currency): void
    {
        $this->registerIfNameIsUnique($currency);
    }

    public function registerIfNameIsUnique(Currency $currency): void
    {
        $currencyType = $currency->getCurrency();
        if ($this->registerGateway->checkIfCurrencyIsInUse($currencyType)) {
            throw new \DomainException('Currency already be registered!');
        }

        $this->registerData($currency);
    }

    private function registerData(Currency $currency): void
    {
        $registeredCurrency = $this->registerGateway->register($currency);
        $this->presenter->addData($registeredCurrency);
    }
}