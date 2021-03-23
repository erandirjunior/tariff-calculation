<?php

namespace SRC\RoomCurrency\Adapters\Presenters;

use SRC\RoomCurrency\Domain\Find\Presenter;
use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredRoomCurrency $registeredRoomPrice): void
    {
        $this->findByCodeVM->setData(
            $registeredRoomPrice->getRoomId(),
            $registeredRoomPrice->getCurrencyId(),
            $registeredRoomPrice->getPrice(),
            $registeredRoomPrice->getHotelId(),
            $registeredRoomPrice->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}