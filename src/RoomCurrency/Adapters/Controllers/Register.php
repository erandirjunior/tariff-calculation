<?php

namespace SRC\RoomCurrency\Adapters\Controllers;

use SRC\RoomCurrency\Domain\Register\Room;
use SRC\RoomCurrency\Domain\Register\RoomCurrency;

class Register
{
    public function __construct(
        private \SRC\RoomCurrency\Adapters\Presenters\Register $presenter,
        private \SRC\RoomCurrency\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(int $roomId, int $currencyId, float $price, int $hotelId)
    {
        $domain = new \SRC\RoomCurrency\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $room = new RoomCurrency($roomId, $currencyId, $price, $hotelId);

        $domain->register($room);
    }
}