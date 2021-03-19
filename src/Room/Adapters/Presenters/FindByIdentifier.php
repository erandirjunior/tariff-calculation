<?php

namespace SRC\Room\Adapters\Presenters;

use SRC\Room\Domain\Find\Presenter;
use SRC\Room\Domain\RegisteredRoom;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredRoom $registeredRoom): void
    {
        $this->findByCodeVM->setData(
            $registeredRoom->getRoom(),
            $registeredRoom->getId(),
            $registeredRoom->getHotel()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}