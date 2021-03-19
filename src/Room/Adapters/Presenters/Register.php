<?php

namespace SRC\Room\Adapters\Presenters;

use SRC\Room\Domain\Register\Presenter;
use SRC\Room\Domain\RegisteredRoom;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredRoom $registeredRoom): void
    {
        $content = [
            'room' => $registeredRoom->getRoom(),
            'id' => $registeredRoom->getId(),
            'hotelId' => $registeredRoom->getHotel(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}