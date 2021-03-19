<?php

namespace SRC\Room\Adapters\Presenters;

use SRC\Room\Domain\Find\FinderAllPresenter;
use SRC\Room\Domain\Find\RoomContainer;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(RoomContainer $roomContainer): void
    {
        foreach ($roomContainer->getData() as $room) {
            $this->findAllVM->setData($room->getRoom(), $room->getId(), $room->getHotel());
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}