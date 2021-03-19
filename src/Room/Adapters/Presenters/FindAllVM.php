<?php

namespace SRC\Room\Adapters\Presenters;

interface FindAllVM
{
    public function setData(string $room, int $id, int $hotelId): void;

    public function getData(): array;
}