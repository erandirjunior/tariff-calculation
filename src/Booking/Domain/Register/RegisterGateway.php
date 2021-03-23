<?php

namespace SRC\Booking\Domain\Register;

use SRC\Booking\Domain\ContractBooking;

interface RegisterGateway
{
    public function register(Contract $contract): ContractBooking;

    public function checkIfUseHasBookedWithOtherSeller(int $userId, int $sellerId): bool;
}