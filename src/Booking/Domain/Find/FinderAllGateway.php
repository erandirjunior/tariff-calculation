<?php

namespace SRC\Booking\Domain\Find;

interface FinderAllGateway
{
    public function findAll(int $userId): BookingContainer;
}