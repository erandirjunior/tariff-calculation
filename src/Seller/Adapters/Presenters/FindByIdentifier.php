<?php

namespace SRC\Seller\Adapters\Presenters;

use SRC\Seller\Domain\Find\Presenter;
use SRC\Seller\Domain\RegisteredSeller;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredSeller $registeredSeller): void
    {
        $this->findByCodeVM->setData(
            $registeredSeller->getName(),
            $registeredSeller->getProfitMargin(),
            $registeredSeller->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}