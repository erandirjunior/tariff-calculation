<?php

namespace SRC\Room\Domain\Find;

use SRC\Room\Domain\RegisteredRoom;

class RoomContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredRoom $registeredRoom)
    {
        $this->data[] = $registeredRoom;
    }

    public function getData(): array
    {
        return $this->data;
    }
}