<?php

namespace SRC\Coin\Adapters\Presenters;

use SRC\Coin\Domain\Find\CoinContainer;
use SRC\Coin\Domain\Find\FinderAllPresenter;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(CoinContainer $coinContainer): void
    {
        foreach ($coinContainer->getData() as $coin) {
            $this->findAllVM->setData($coin->getMoney(), $coin->getProfitMargin(), $coin->getId());
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}