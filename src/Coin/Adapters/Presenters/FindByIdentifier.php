<?php

namespace SRC\Coin\Adapters\Presenters;

use SRC\Coin\Domain\Find\Presenter;
use SRC\Coin\Domain\RegisteredCoin;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredCoin $coin): void
    {
        $this->findByCodeVM->setData(
            $coin->getMoney(),
            $coin->getProfitMargin(),
            $coin->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}