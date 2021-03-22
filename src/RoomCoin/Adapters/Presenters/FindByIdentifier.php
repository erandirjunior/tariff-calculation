<?php

namespace SRC\RoomCoin\Adapters\Presenters;

use SRC\RoomCoin\Domain\Find\Presenter;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredRoomCoin $registeredRoomPrice): void
    {
        $this->findByCodeVM->setData(
            $registeredRoomPrice->getRoomId(),
            $registeredRoomPrice->getCoinId(),
            $registeredRoomPrice->getPrice(),
            $registeredRoomPrice->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}