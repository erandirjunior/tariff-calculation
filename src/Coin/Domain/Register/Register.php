<?php

namespace SRC\Coin\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(Coin $money): void
    {
        $this->registerIfNameIsUnique($money);
    }

    public function registerIfNameIsUnique(Coin $money): void
    {
        $moneyType = $money->getMoney();
        if ($this->registerGateway->checkIfMoneyIsInUse($moneyType)) {
            throw new \DomainException('Money type already registered!');
        }

        $this->registerData($money);
    }

    private function registerData(Coin $money): void
    {
        $registeredMoney = $this->registerGateway->register($money);
        $this->presenter->addData($registeredMoney);
    }
}