<?php

namespace SRC\Room\Adapters\Controllers;

use SRC\Room\Domain\Register\Room;

class Register
{
    public function __construct(
        private \SRC\Room\Adapters\Presenters\Register $presenter,
        private \SRC\Room\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(int $hotelId, string $room)
    {
        $domain = new \SRC\Room\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $room = new Room($room, $hotelId);

        $domain->register($room);
    }
}