<?php

namespace SRC\Currency\Adapters\Presenters;

use SRC\Currency\Domain\Find\CurrencyContainer;
use SRC\Currency\Domain\Find\FinderAllPresenter;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(CurrencyContainer $currencyContainer): void
    {
        foreach ($currencyContainer->getData() as $currency) {
            $this->findAllVM->setData($currency->getCurrency(), $currency->getProfitMargin(), $currency->getId());
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}