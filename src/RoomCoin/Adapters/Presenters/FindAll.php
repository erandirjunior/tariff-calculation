<?php

namespace SRC\RoomCoin\Adapters\Presenters;

use SRC\RoomCoin\Domain\Find\FinderAllPresenter;
use SRC\RoomCoin\Domain\Find\RoomPriceContainer;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(RoomPriceContainer $roomPriceContainer): void
    {
        foreach ($roomPriceContainer->getData() as $room) {
            $this->findAllVM->setData(
                $room->getRoomId(),
                $room->getCoinId(),
                $room->getId()
            );
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}