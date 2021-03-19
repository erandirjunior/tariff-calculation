<?php

namespace SRC\Hotel\Adapters\Presenters;

use SRC\Hotel\Domain\Find\Presenter;
use SRC\Hotel\Domain\RegisteredHotel;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredHotel $registeredHotel): void
    {
        $this->findByCodeVM->setData(
            $registeredHotel->getName(),
            $registeredHotel->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}