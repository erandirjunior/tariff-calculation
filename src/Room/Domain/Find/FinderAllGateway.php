<?php

namespace SRC\Room\Domain\Find;

interface FinderAllGateway
{
    public function findAll(int $hotelId): RoomContainer;
}