<?php

namespace SRC\RoomCoin\Adapters\Controllers;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;
use SRC\RoomCoin\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\RoomCoin\Adapters\Gateways\Update $updaterGateway
    )
    {}

    public function handle(int $roomId, int $coinId, float $price, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $room = new RegisteredRoomCoin($roomId, $coinId, $price, $id);
        $domain->update($room);
    }
}