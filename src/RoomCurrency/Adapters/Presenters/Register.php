<?php

namespace SRC\RoomCoin\Adapters\Presenters;

use SRC\RoomCoin\Domain\Register\Presenter;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredRoomCoin $registeredRoomPrice): void
    {
        $content = [
            'roomId' => $registeredRoomPrice->getRoomId(),
            'currencyId' => $registeredRoomPrice->getCoinId(),
            'price' => $registeredRoomPrice->getPrice(),
            'hotel_id' => $registeredRoomPrice->getHotelId(),
            'id' => $registeredRoomPrice->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}