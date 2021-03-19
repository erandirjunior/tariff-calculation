<?php

namespace SRC\Hotel\Domain\Find;

use SRC\Hotel\Domain\RegisteredHotel;

interface FinderByIdentifierGateway
{
    public function find(int $id): RegisteredHotel;
}