<?php

namespace SRC\Room\Domain;

use SRC\Room\Domain\Register\Room;

class RegisteredRoom extends Room
{
    public function __construct(
        private string $room,
        private int $hotel,
        private int $id
    )
    {
        parent::__construct($this->room, $this->hotel);
    }

    public function getId(): int
    {
        return $this->id;
    }
}