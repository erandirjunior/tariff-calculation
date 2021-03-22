<?php

namespace SRC\Saller\Adapters\Presenters;

use SRC\Saller\Domain\Find\Presenter;
use SRC\Saller\Domain\RegisteredSaller;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredSaller $registeredSaller): void
    {
        $this->findByCodeVM->setData(
            $registeredSaller->getName(),
            $registeredSaller->getProfitMargin(),
            $registeredSaller->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}