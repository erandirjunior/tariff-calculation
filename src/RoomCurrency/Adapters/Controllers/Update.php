<?php

namespace SRC\RoomCurrency\Adapters\Controllers;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;
use SRC\RoomCurrency\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\RoomCurrency\Adapters\Gateways\Update $updaterGateway
    )
    {}

    public function handle(int $roomId, int $currencyId, float $price, int $id, int $hotelId)
    {
        $domain = new Updater($this->updaterGateway);
        $room = new RegisteredRoomCurrency($roomId, $currencyId, $price, $hotelId, $id);
        $domain->update($room);
    }
}