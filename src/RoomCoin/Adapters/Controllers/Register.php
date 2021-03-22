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

    public function handle(int $roomId, int $coinId, float $price)
    {
        $domain = new \SRC\RoomCoin\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $room = new RoomCoin($roomId, $coinId, $price);

        $domain->register($room);
    }
}