<?php

namespace SRC\Booking\Domain\Find;

use SRC\Booking\Domain\ContractBooking;

interface FinderByIdentifierGateway
{
    public function find(int $userId, int $id): ContractBooking;
}