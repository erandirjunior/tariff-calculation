<?php

namespace SRC\RoomCoin\Domain;

use SRC\RoomCoin\Domain\Register\RoomCoin;

class RegisteredRoomCoin extends RoomCoin
{
    public function __construct(
        private int $roomId,
        private int $coinId,
        private float $price,
        private int $id
    )
    {
        parent::__construct($this->roomId, $this->coinId, $this->price);
    }

    public function getId(): int
    {
        return $this->id;
    }
}