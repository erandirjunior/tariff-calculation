<?php

namespace SRC\Currency\Adapters\Presenters;

use SRC\Currency\Domain\Find\Presenter;
use SRC\Currency\Domain\RegisteredCurrency;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredCurrency $registeredCurrency): void
    {
        $this->findByCodeVM->setData(
            $registeredCurrency->getCurrency(),
            $registeredCurrency->getProfitMargin(),
            $registeredCurrency->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}