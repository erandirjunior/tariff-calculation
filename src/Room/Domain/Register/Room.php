<?php

namespace SRC\Room\Domain\Register;

class Room
{
    public function __construct(
        private string $room,
        private int $hotel
    )
    {
        $this->room = strtoupper($this->room);
        if (!in_array($this->room, ['SGL', 'DBL', 'TLP', 'QDPL'])) {
            $msg = 'Room type is not valid!';
            throw new \InvalidArgumentException($msg);
        }
    }

    public function getRoom(): string
    {
        return $this->room;
    }

    public function getHotel(): int
    {
        return $this->hotel;
    }
}