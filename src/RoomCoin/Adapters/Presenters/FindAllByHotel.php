<?php

namespace SRC\RoomCoin\Adapters\Presenters;

use SRC\RoomCoin\Domain\Find\FinderAllByHotelPresenter;
use SRC\RoomCoin\Domain\Find\RoomPriceContainer;

class FindAllByHotel implements FinderAllByHotelPresenter
{
    public function __construct(private FindAllByHotelVM $findAllByHotelVM)
    {}

    public function setData(RoomPriceContainer $roomPriceContainer): void
    {
        foreach ($roomPriceContainer->getData() as $room) {
            $this->findAllByHotelVM->setData($room->getRoomId(),
                $room->getCoinId(),
                $room->getPrice(),
                $room->getId()
            );
        }
    }

    public function getData(): array
    {
        return $this->findAllByHotelVM->getData();
    }
}