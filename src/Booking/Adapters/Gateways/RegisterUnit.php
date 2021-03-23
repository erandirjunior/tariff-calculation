<?php

namespace SRC\Booking\Adapters\Gateways;

use SRC\Booking\Domain\Register\Contract;

interface RegisterUnit
{
    public function register(Contract $contract): int;

    public function checkIfUseHasBookedWithOtherSeller(int $userId, int $sellerId): bool;
}