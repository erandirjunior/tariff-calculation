<?php

namespace SRC\Coin\Adapters\Gateways;

use SRC\Coin\Domain\Register\Coin;
use SRC\Coin\Domain\Register\RegisterGateway;
use SRC\Coin\Domain\RegisteredCoin;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Coin $coin): RegisteredCoin
    {
        $id = $this->registerUnit->register($coin->getMoney(), $coin->getProfitMargin());
        return new RegisteredCoin(
            $coin->getMoney(),
            $coin->getProfitMargin(),
            $id
        );
    }

    public function checkIfMoneyIsInUse(string $money): bool
    {
        return $this->registerUnit->checkIfMoneyIsInUse($money);
    }
}