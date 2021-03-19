<?php

namespace SRC\Coin\Adapters\Presenters;

use SRC\Coin\Domain\Register\Presenter;
use SRC\Coin\Domain\RegisteredCoin;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredCoin $registeredMoney): void
    {
        $content = [
            'money' => $registeredMoney->getMoney(),
            'profitMargin' => $registeredMoney->getProfitMargin(),
            'id' => $registeredMoney->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}