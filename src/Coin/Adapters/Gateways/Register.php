<?php

namespace SRC\Coin\Adapters\Gateways;

use SRC\Coin\Domain\Register\Coin;
use SRC\Coin\Domain\Register\RegisterGateway;
use SRC\Coin\Domain\RegisteredCoin;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Coin $money): RegisteredCoin
    {
        $id = $this->registerUnit->register($money->getMoney(), $money->getProfitMargin());
        $data = $this->registerUnit->find($id);
        return new RegisteredCoin(
            $data['money'],
            $data['profit_margin'],
            $data['id']
        );
    }

    public function checkIfMoneyIsInUse(string $name): bool
    {
        return $this->registerUnit->checkIfMoneyIsInUse($name);
    }
}