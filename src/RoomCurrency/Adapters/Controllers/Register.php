<?php

namespace SRC\RoomCoin\Adapters\Controllers;

use SRC\RoomCoin\Domain\Register\Room;
use SRC\RoomCoin\Domain\Register\RoomCoin;

class Register
{
    public function __construct(
        private \SRC\RoomCoin\Adapters\Presenters\Register $presenter,
        private \SRC\RoomCoin\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(int $roomId, int $currencyId, float $price, int $hotelId)
    {
        $domain = new \SRC\RoomCoin\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $room = new RoomCoin($roomId, $currencyId, $price, $hotelId);

        $domain->register($room);
    }
}