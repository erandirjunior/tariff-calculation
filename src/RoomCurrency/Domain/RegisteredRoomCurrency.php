<?php

namespace SRC\RoomCurrency\Domain;

use SRC\RoomCurrency\Domain\Register\RoomCurrency;

class RegisteredRoomCurrency extends RoomCurrency
{
    public function __construct(
        private int $roomId,
        private int $currencyId,
        private float $price,
        private int $hotelId,
        private int $id
    )
    {
        parent::__construct($this->roomId, $this->currencyId, $this->price, $this->hotelId);
    }

    public function getId(): int
    {
        return $this->id;
    }
}