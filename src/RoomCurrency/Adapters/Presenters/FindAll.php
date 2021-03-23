<?php

namespace SRC\RoomCurrency\Adapters\Presenters;

use SRC\RoomCurrency\Domain\Find\FinderAllPresenter;
use SRC\RoomCurrency\Domain\Find\RoomPriceContainer;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(RoomPriceContainer $roomPriceContainer): void
    {
        foreach ($roomPriceContainer->getData() as $room) {
            $this->findAllVM->setData(
                $room->getRoomId(),
                $room->getCurrencyId(),
                $room->getPrice(),
                $room->getHotelId(),
                $room->getId()
            );
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}