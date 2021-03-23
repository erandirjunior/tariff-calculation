<?php

namespace SRC\RoomCurrency\Adapters\Presenters;

use SRC\RoomCurrency\Domain\Register\Presenter;
use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredRoomCurrency $registeredRoomPrice): void
    {
        $content = [
            'roomId' => $registeredRoomPrice->getRoomId(),
            'currencyId' => $registeredRoomPrice->getCurrencyId(),
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