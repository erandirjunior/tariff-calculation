<?php

namespace SRC\Currency\Adapters\Presenters;

use SRC\Currency\Domain\Register\Presenter;
use SRC\Currency\Domain\RegisteredCurrency;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredCurrency $registeredCurrency): void
    {
        $content = [
            'currency' => $registeredCurrency->getCurrency(),
            'profitMargin' => $registeredCurrency->getProfitMargin(),
            'id' => $registeredCurrency->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}