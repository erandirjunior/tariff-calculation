<?php

namespace SRC\Room\Adapters\Controllers;

use SRC\Room\Domain\RegisteredRoom;
use SRC\Room\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\Room\Adapters\Gateways\Update $updaterGateway
    )
    {}

    public function handle(int $hotelId, string $name, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $room = new RegisteredRoom($name, $hotelId, $id);
        $domain->update($room);
    }
}